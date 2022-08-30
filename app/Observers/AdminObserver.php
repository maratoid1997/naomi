<?php

namespace App\Observers;

use App\Models\Stuff\Admin;
use App\Models\User;

class AdminObserver
{
    public function creating(Admin $admin){
        $admin->user_id = User::create([
            'email' => $admin->getAttributes()['email'],
            'password' => $admin->password
        ])->id;

        $admin->assignRole($admin->role);
        unset($admin->role);
        unset($admin->email);
        unset($admin->password);
    }

    public function updating(Admin $admin){
        $admin->user()->update(['email' => $admin->getAttributes()['email']]);

        $admin->assignRole($admin->role);
        unset($admin->role);
        unset($admin->email);
    }
}
