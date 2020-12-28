<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullableFixHomeCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('homeCourses', function (Blueprint $table){
            $table->unsignedBigInteger('notSoUniqueId')
            ->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('homeCourses', function (Blueprint $table) {
            $table->unsignedBigInteger('notSoUniqueId')
            ->nullable(false)->change();
        });
    }
}
