<?php

namespace App\Models\Customers;

use App\Models\Customers\Addresses\Address;
use App\Models\Products\Carts\Cart;
use App\Models\Products\Product;
use App\Models\Rewards\Reward;
use App\Models\Rewards\RewardLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;


class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customers';
    protected $fillable = [
        'fullname',
        'phone',
        'gender',
        'user_id',
    ];

    protected static function boot()
    {
        parent::boot();

        self::saved(function($customer){
            Cache::forget('customer.'.$customer->id.'.details');
        });
        self::creating(function ($req){
            $req->user_id = User::create([
                'email' => $req->getAttributes()['email'],
                'password' => $req->password
            ])->id;
            unset($req->email);
            unset($req->password);
        });

        self::updating(function ($req){
            User::find($req->user_id)->update(['email' => $req->getAttributes()['email']]);
            unset($req->email);
        });

        self::deleting(function ($req){
            $req->user()->delete();
        });
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function addresses(){
        return $this->hasMany(Address::class,'customer_id');
    }

    public function cart(){
        return $this->hasOne(Cart::class, 'customer_id');
    }

    public function reward(){
        return $this->hasOne(Reward::class, 'customer_id');
    }

    public function rewardLogs(){
        return $this->hasManyThrough(RewardLog::class,Reward::class);
    }

    public function getEmailAttribute(){
        $user = $this->user;
        return $user ? $user->email : '';
    }
}
