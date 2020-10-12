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
        Schema::create('pairings', function (Blueprint $table) 
        {
            $table->foreignId('foreignId')
                  ->constrained('foreignCourses');
            
            $table->foreignId('mobilityId')
                  ->constrained('mobilities');
            
            $table->foreignId('homeId')
                  ->constrained('homeCourses');
                
            $table->primary(['mobilityId','foreignId','homeId']);

            $table->boolean('isSummer');

            $table->year('year');
            
            $table->string('rating')
                  ->nullable;

            $table->string('unlinked')
                  ->nullable;
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
