<?php

namespace Packages\News\Database\Seeds;

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
//        $this->call(AuthorTableSeeder::class);
//        $this->call(ArticleTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(GroupPermissionTableSeeder::class);
    }
}
