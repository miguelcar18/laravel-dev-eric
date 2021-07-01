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
        Group::firstOrCreate([
            'name' => 'superAdmin',
            'slug' => 'system:superAdmin',
            'description' => 'superAdmin del sistema'
        ]);
        Group::firstOrCreate([
            'name' => 'dev',
            'slug' => 'system:dev',
            'description' => 'dev del sistema'
        ]);
        Group::firstOrCreate([
            'name' => 'creator',
            'slug' => 'system:creator',
            'description' => 'creator del sistema'
        ]);
    }
}
