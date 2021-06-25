<?php

namespace Packages\System\Database\Seeds;

use Packages\System\Models\SystemArticle;
use Illuminate\Database\Seeder;

class SystemArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SystemArticle::firstOrCreate([
            'title'     =>  'Titulo 1',
            'body'      =>  'Descripcion 1',
            'author'    =>  'Pedro'
        ]);
        SystemArticle::firstOrCreate([
            'title' => 'Titulo 2',
            'body' => 'Descripcion 2',
            'author' => 'Pedro'
        ]);
        SystemArticle::firstOrCreate([
            'title' => 'Titulo 3',
            'body' => 'Descripcion 3',
            'author' => 'Pedro'
        ]);
        SystemArticle::firstOrCreate([
            'title' => 'Titulo 4',
            'body' => 'Descripcion 4',
            'author' => 'Pedro'
        ]);
        SystemArticle::firstOrCreate([
            'title' => 'Titulo 5',
            'body' => 'Descripcion 5',
            'author' => 'Pedro'
        ]);
        SystemArticle::firstOrCreate([
            'title' => 'Titulo 6',
            'body' => 'Descripcion 6',
            'author' => 'Pedro'
        ]);
        SystemArticle::firstOrCreate([
            'title' => 'Titulo 7',
            'body' => 'Descripcion 7',
            'author' => 'Pedro'
        ]);
        SystemArticle::firstOrCreate([
            'title' => 'Titulo 8',
            'body' => 'Descripcion 8',
            'author' => 'Pedro'
        ]);
        SystemArticle::firstOrCreate([
            'title' => 'Titulo 9',
            'body' => 'Descripcion 9',
            'author' => 'Pedro'
        ]);
        SystemArticle::firstOrCreate([
            'title' => 'Titulo 10',
            'body' => 'Descripcion 10',
            'author' => 'Pedro'
        ]);
    }
}
