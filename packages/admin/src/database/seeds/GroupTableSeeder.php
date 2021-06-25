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
            'name' => 'administrador',
            'slug' => 'administrador',
            'description' => 'administrador del sistema'
        ]);
        Group::firstOrCreate([
            'name' => 'supervisor',
            'slug' => 'supervisor',
            'description' => 'supervisor del sistema'
        ]);
        Group::firstOrCreate([
            'name' => 'redactor',
            'slug' => 'redactor',
            'description' => 'redactor del sistema'
        ]);
    }
}
