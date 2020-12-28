<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameForeignKeyPairingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pairings', function (Blueprint $table) {
            $table->renameColumn('mobilityId', 'mobility_id');
            $table->renameColumn('foreignId', 'foreignCourse_id');
            $table->renameColumn('homeId', 'homeCourse_id');
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
            $table->renameColumn('mobility_id', 'mobilityId');
            $table->renameColumn('foreignCourse_id', 'foreignId');
            $table->renameColumn('homeCourse_id', 'homeId');

        });
    }
}
