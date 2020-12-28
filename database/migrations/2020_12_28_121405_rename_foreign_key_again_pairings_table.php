<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameForeignKeyAgainPairingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pairings', function (Blueprint $table) {
            $table->renameColumn('foreignCourse_id', 'foreign_course_id');
            $table->renameColumn('homeCourse_id', 'home_course_id' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pairings', function (Blueprint $table) {
            $table->renameColumn('foreign_course_id', 'foreignCourse_id');
            $table->renameColumn('home_course_id' , 'homeCourse_id');
        });
    }
}
