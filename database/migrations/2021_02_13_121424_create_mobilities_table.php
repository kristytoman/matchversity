<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DatabaseNames::MOBILITIES_TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignId(DatabaseNames::UNIVERSITY_ID_COLUMN)
                  ->constrained(DatabaseNames::UNIVERSITIES_TABLE);
            $table->string(DatabaseNames::STUDENT_COLUMN, 256);
            $table->date(DatabaseNames::ARRIVAL_COLUMN);
            $table->date(DatabaseNames::DEPARTURE_COLUMN);
            $table->year(DatabaseNames::YEAR_COLUMN);
            $table->boolean(DatabaseNames::IS_SUMMER_COLUMN);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DatabaseNames::MOBILITIES_TABLE);
    }
}
