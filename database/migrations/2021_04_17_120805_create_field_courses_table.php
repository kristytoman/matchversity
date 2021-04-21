<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_courses', function (Blueprint $table) {
            $table->foreignId('home_course_id')
                  ->constrained('home_courses');
            $table->foreignId('field_id')
                  ->constrained('fields');
            $table->tinyInteger('grade')->nullable();
            $table->boolean('is_summer')->nullable();
            $table->boolean('compulsory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_courses');
    }
}