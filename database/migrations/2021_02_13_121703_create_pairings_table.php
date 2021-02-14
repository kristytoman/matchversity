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
        Schema::create(DatabaseNames::PAIRINGS_TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignId(DatabaseNames::FOREIGN_COURSE_ID_COLUMN)
                  ->constrained(DatabaseNames::FOREIGN_COURSES_TABLE);            
            $table->foreignId(DatabaseNames::MOBILITY_ID_COLUMN)
                  ->constrained(DatabaseNames::MOBILITIES_TABLE);            
            $table->foreignId(DatabaseNames::HOME_COURSE_ID_COLUMN)
                  ->constrained(DatabaseNames::HOME_COURSES_TABLE);
            $table->tinyInteger(DatabaseNames::RATING_COLUMN)
                  ->nullable()
                  ->default(null);
            $table->foreignId(DatabaseNames::REASON_ID_COLUMN)
                  ->nullable()
                  ->default(null)
                  ->constrained(DatabaseNames::REASONS_TABLE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DatabaseNames::PAIRINGS_TABLE);
    }
}
