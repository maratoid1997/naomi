<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;

class ContactPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public static function create()
    {
        return false;
    }

    public function view(){
        return true;
    }

    public function delete()
    {
        return false;
    }

    public function update(){
        return true;
    }
}
