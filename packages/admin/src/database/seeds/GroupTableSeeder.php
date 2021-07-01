<?php

namespace Packages\Admin\Database\Seeds;

use Illuminate\Database\Seeder;
use Packages\Admin\Models\Group;

class GroupTableSeeder extends Seeder
{
    /**
     *  Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::firstOrCreate([
            'name' => 'admin:administrador',
            'slug' => 'admin:administrador',
            'description' => 'administrador del sistema'
        ]);
        Group::firstOrCreate([
            'name' => 'admin:supervisor',
            'slug' => 'admin:supervisor',
            'description' => 'supervisor del sistema'
        ]);
        Group::firstOrCreate([
            'name' => 'admin:redactor',
            'slug' => 'admin:redactor',
            'description' => 'redactor del sistema'
        ]);
    }
}
