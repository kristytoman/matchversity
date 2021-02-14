<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DatabaseNames::COUNTRIES_TABLE, function (Blueprint $table) {
            $table->string(DatabaseNames::COUNTRY_ID_COLUMN, 2);
            $table->primary(DatabaseNames::COUNTRY_ID_COLUMN);
            $table->string(DatabaseNames::REGION_COLUMN, 20);
            $table->string(DatabaseNames::CONTINENT_COLUMN, 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DatabaseNames::COUNTRIES_TABLE);
    }
}
