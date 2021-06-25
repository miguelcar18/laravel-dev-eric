<?php

namespace Packages\News\Database\Seeds;

use Illuminate\Database\Seeder;
use Packages\News\Models\Author;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::firstOrCreate([
            'name'  =>  'Alexis',
            'lastName'  =>  'Diaz',
            'dni'   =>  '41653151651',
            'phone' =>  '51651531'
        ]);
        Author::firstOrCreate([
            'name'  =>  'Luis',
            'lastName'  =>  'Ojeda',
            'dni'   =>  '41414351',
            'phone' =>  '86516851'
        ]);
    }
}
