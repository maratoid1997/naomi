<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class CurrencyPolicy
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

    public function view(){
        return true;
    }

    public function delete(){
        return false;
    }

    public function update(){
        return true;
    }
}
