<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::updateOrCreate(['title' => 'Admin', 'slug' => 'admin', 'deletable' => false])
            ->permissions()
            ->sync($admin_permissions->pluck('id'));

        Role::updateOrCreate(['title' => 'Employee', 'slug' => 'employee', 'deletable' => false])
            ->permissions()
            ->sync([]);   

        Role::updateOrCreate(['title' => 'Store Keeper', 'slug' => 'store-keeper', 'deletable' => false])
            ->permissions()
            ->sync([]);     

    }
}
