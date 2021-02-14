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
        Schema::create(DatabaseNames::UNIVERSITIES_TABLE, function (Blueprint $table) 
        {
            $table->id();
            $table->string(DatabaseNames::NAME_COLUMN, 128)
                  ->nullable()
                  ->default(null);            
            $table->string(DatabaseNames::NATIVE_NAME_COLUMN, 128)
                  ->nullable()
                  ->default(null);            
            $table->string(DatabaseNames::ORIGINAL_NAME_COLUMN, 128);
            $table->foreignId(DatabaseNames::CITY_ID_COLUMN)
                  ->nullable()
                  ->default(null)           
                  ->constrained(DatabaseNames::CITIES_TABLE);
            $table->string(DatabaseNames::XCHANGE_COLUMN, 256)
                  ->nullable()
                  ->default(null);            
            $table->string(DatabaseNames::WEB_COLUMN, 256)
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
        Schema::dropIfExists(DatabaseNames::UNIVERSITIES_TABLE);
    }
}
