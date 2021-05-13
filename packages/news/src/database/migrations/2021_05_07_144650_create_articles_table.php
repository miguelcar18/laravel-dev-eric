<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('body')->nullable();
            $table->enum('section',[
                'deportes','economia','tecnologia','entretenimiento'
            ])->nullable();
            $table->uuid('author_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('author_id')
                ->references('id')
                ->on('authors')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
