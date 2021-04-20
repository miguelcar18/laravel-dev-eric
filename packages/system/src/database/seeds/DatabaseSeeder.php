<?php

namespace Packages\System\Database\Seeds;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(SystemSettingTableSeeder::class);
//        $this->call(SystemRegionTableSeeder::class);
//        $this->call(SystemCountyTableSeeder::class);
        $this->call(SystemUserTableSeeder::class);
        $this->call(SystemArticleTableSeeder::class);
    }
}
