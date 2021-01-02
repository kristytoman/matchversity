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
        Schema::create('universities', function (Blueprint $table) 
        {
            $table->id();
            $table->string('name', 128);
            $table->string('original_name', 128);
            $table->foreignId('city_id')
                  ->constrained('cities');
            $table->string('xchange', 256)
                  ->nullable();
            $table->string('web', 256)
                  ->nullable();
            $table->date('expiration');
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
