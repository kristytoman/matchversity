<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DatabaseNames::FACULTIES_TABLE, function (Blueprint $table) {
            $table->string(DatabaseNames::FACULTY_ID_COLUMN, 3);
            $table->primary(DatabaseNames::FACULTY_ID_COLUMN);
            $table->string(DatabaseNames::NAME_COLUMN, 128);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DatabaseNames::FACULTIES_TABLE);
    }
}
