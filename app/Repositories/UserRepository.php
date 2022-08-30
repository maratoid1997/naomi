<?php


namespace App\Repositories;


use App\Models\User;
use App\Repositories\Contractors\UserRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;


class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function updatePassword($id, $credentials){
        return $this->find($id)->update([
            'password' => Hash::make($credentials['password'])
        ]);
    }
}
