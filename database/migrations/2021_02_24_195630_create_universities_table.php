<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128)
                  ->nullable()
                  ->default(null);            
            $table->string('native_name', 128)
                  ->nullable()
                  ->default(null);            
            $table->string('original_name', 128);
            $table->foreignId('city_id')
                  ->nullable()
                  ->default(null)           
                  ->constrained('cities');
            $table->bigInteger('xchange')
                  ->nullable()
                  ->default(null);            
            $table->string('web', 256)
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
        Schema::dropIfExists('universities');
    }
}
