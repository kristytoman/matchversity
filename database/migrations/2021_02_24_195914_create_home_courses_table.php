<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_courses', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('group')
                  ->nullable()
                  ->default(null);            
            $table->string('code', 64);
            $table->string('name_cz', 128)
                  ->nullable()
                  ->default(null);
            $table->string('name_en', 128)
                  ->nullable()
                  ->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_courses');
    }
}
