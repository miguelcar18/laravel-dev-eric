<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemCountiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_counties', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('countyCode')->index();
            $table->string('countyName')->index();
            $table->string('regionCode');
            $table->integer('ineCountyCode');
            $table->tinyInteger('queryMode');
            $table->string('coverageName');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_counties');
    }
}
