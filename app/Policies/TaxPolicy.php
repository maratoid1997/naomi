<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;

class TaxPolicy
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

    public function delete(){
        return false;
    }

    public function create(){
        return false;
    }

    public function update(){
        return true;
    }

    public function view(){
        return true;
    }
}
