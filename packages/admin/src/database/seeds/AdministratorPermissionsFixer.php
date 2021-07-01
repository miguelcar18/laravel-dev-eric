<?php

namespace Packages\Admin\Database\Seeds;

use Illuminate\Database\Seeder;
use Packages\Admin\Models\Group;
use Packages\Admin\Models\Permission;

class AdministratorPermissionsFixer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(array_keys(\Route::getRoutes()->getRoutesByName()))->each(function ($route) {
            Permission::firstOrCreate(['slug' => "route:{$route}"], ['name' => "route:{$route}"]);
        });

        Permission::firstOrCreate(['slug' => "reset-user-password"], ['name' => "reset user password"]);
        Group::firstOrCreate(['slug' => 'administrator'])->assignAllPermissions();
    }
}
