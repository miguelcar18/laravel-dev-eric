<?php

namespace Packages\News\Database\Seeds;

use Illuminate\Database\Seeder;
use Packages\News\Models\Article;

class ArticleTableSeeder extends Seeder
{
    /**
     *  Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Article::create([
            'title' =>  'titulo',
            'subtitle'  =>  'subtitulo',
            'body'  =>  'cuerpo del articulo',
            'section'  =>  'deportes',
            'author'    =>  'pedro'
        ]);
        Article::create([
            'title' =>  'titulo2',
            'subtitle'  =>  'subtitulo2',
            'body'  =>  'cuerpo del articulo2',
            'section'  =>  'economia',
            'author'    =>  'Antonio'
        ]);
    }
}
