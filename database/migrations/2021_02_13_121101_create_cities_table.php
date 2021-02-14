<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DatabaseNames::CITIES_TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(DatabaseNames::NAME_COLUMN, 126);
            $table->foreignId(DatabaseNames::COUNTRY_ID_COLUMN);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DatabaseNames::CITIES_TABLE);
    }
}
