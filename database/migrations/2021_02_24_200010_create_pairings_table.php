<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePairingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pairings', function (Blueprint $table) {
            $table->timestamps();
            $table->id();
            $table->foreignId('foreign_course_id')
                  ->constrained('foreign_courses');            
            $table->foreignId('mobility_id')
                  ->constrained('mobilities');            
            $table->foreignId('home_course_id')
                  ->constrained('home_courses');
            $table->tinyInteger('rating')
                  ->nullable()
                  ->default(null);
            $table->foreignId('reason_id')
                  ->nullable()
                  ->default(null)
                  ->constrained('reasons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pairings');
    }
}
