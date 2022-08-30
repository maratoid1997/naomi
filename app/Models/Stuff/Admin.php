<?php

namespace App\Models\Stuff;

use App\Models\User;
use App\Observers\AdminObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Model
{
    use HasFactory, HasRoles;

    protected $guard_name = 'web';

    protected $table = 'admin_users';
    protected $fillable = [
        'name',
        'phone',
        'user_id'
    ];

    protected static function boot()
    {
        parent::boot();
        self::observe(AdminObserver::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function getEmailAttribute(){
        $user = $this->user;
        return $user ? $user->email : '';
    }
}
