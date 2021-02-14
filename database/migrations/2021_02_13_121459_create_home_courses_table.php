<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DatabaseNames::HOME_COURSES_TABLE, function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger(DatabaseNames::COURSE_GROUP_COLUMN)
                  ->nullable()
                  ->default(null);            
            $table->string(DatabaseNames::CODE_COLUMN, 64);
            $table->string(DatabaseNames::NAME_COLUMN, 128)
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
        Schema::dropIfExists(DatabaseNames::HOME_COURSES_TABLE);
    }
}
