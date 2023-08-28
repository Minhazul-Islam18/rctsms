<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create Default Role
        $roles = [
            ['name' => 'Super Admin'],
            ['name' => 'Admin']
        ];
        foreach ($roles as $role) {
            $role = Role::create($role);
        }
        //Create Dummy Permissions
        $permissions = [
            ['name' => 'create role'],
            ['name' => 'edit role'],
            ['name' => 'delete role'],
            ['name' => 'change settings']
        ];

        foreach ($permissions as $item) {
            Permission::create($item);
        }


        $user = User::first();
        $user->assignRole('Super Admin');
    }
}
