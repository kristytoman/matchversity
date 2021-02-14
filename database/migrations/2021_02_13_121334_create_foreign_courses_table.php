<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DatabaseNames::FOREIGN_COURSES_TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(DatabaseNames::CODE_COLUMN, 64)
                  ->nullable();
            $table->string(DatabaseNames::NAME_COLUMN, 128);
            $table->foreignId(DatabaseNames::UNIVERSITY_ID_COLUMN)
                  ->constrained(DatabaseNames::UNIVERSITIES_TABLE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign_courses');
    }
}
