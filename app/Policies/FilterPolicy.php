<?php

namespace App\Policies;

use App\Models\Products\Filter;
use App\Models\Products\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilterPolicy
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

    public function create(){
        return true;
    }

    public function update(){
        return true;
    }

    public function delete(){
        return true;
    }
}
