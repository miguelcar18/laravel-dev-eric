<?php

namespace Packages\News\Database\Seeds;

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
            'name' => 'admin',
            'slug' => 'admin',
            'description' => 'administrador del sistema'
        ]);
        Group::firstOrCreate([
            'name' => 'gerente',
            'slug' => 'gerente',
            'description' => 'gerente del sistema'
        ]);
        Group::firstOrCreate([
            'name' => 'editor',
            'slug' => 'editor',
            'description' => 'editor del sistema'
        ]);
    }
}
