<?php

namespace Database\Seeders;

use App\Models\Stuff\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();


        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::firstOrCreate(['name' => 'create'],['name' => 'create']);
        Permission::firstOrCreate(['name' => 'read'], ['name' => 'read']);
        Permission::firstOrCreate(['name' => 'update'],['name' => 'update']);
        Permission::firstOrCreate(['name' => 'delete'],['name' => 'delete']);

        $superAdminRole = Role::firstOrCreate(['name' => 'super-admin'],['name' => 'super-admin']);
        $moderatorRole = Role::firstOrCreate(['name' => 'moderator'],['name' => 'moderator']);

        $superAdminRole->givePermissionTo('update');
        $superAdminRole->givePermissionTo('create');
        $superAdminRole->givePermissionTo('read');
        $superAdminRole->givePermissionTo('delete');

        $moderatorRole->givePermissionTo('create');
        $moderatorRole->givePermissionTo('read');
        $moderatorRole->givePermissionTo('update');

        $superAdmin = Admin::firstOrCreate(['phone' => '994999999'],[
            'name' => 'Admin',
            'phone' => '994999999',
            'user_id' => User::firstOrCreate(['email' => 'admin@admin.com'],[
                'email' => 'admin@admin.com',
                'password' => Hash::make(1234),
            ])->id
        ]);

        $superAdmin->assignRole('super-admin');

        $moderator = Admin::firstOrCreate(['phone' => '9947777777'],[
            'name' => 'Moderator',
            'phone' => '9947777777',
            'user_id' => User::firstOrCreate(['email' => 'moderator@admin.com'],[
                'email' => 'moderator@admin.com',
                'password' => Hash::make(1234),
            ])->id
        ]);

        $moderator->assignRole('moderator');

        Schema::enableForeignKeyConstraints();
    }
}
