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
            'name' => 'news:admin',
            'slug' => 'news:admin',
            'description' => 'administrador del sistema'
        ]);
        Group::firstOrCreate([
            'name' => 'news:gerente',
            'slug' => 'news:gerente',
            'description' => 'gerente del sistema'
        ]);
        Group::firstOrCreate([
            'name' => 'news:editor',
            'slug' => 'news:editor',
            'description' => 'editor del sistema'
        ]);
    }
}
