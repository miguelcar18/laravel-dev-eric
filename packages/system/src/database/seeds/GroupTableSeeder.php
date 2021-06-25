<?php

namespace Packages\System\Database\Seeds;

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
        Group::create([
            'name' => 'superAdmin',
            'slug' => 'superAdmin',
            'description' => 'superAdmin del sistema'
        ]);
        Group::create([
            'name' => 'dev',
            'slug' => 'dev',
            'description' => 'dev del sistema'
        ]);
        Group::create([
            'name' => 'creator',
            'slug' => 'creator',
            'description' => 'creator del sistema'
        ]);
    }
}
