<?php


namespace App\Repositories\Contractors;


use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function findByEmail($email);
    public function updatePassword($id, $credentials);
}
