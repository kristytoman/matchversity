<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullableFixPairingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pairings', function (Blueprint $table) {
            $table->string('rating')
                  ->nullable()->change();

            $table->string('unlinked')
                  ->nullable()->change();
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
            $table->string('rating')
                  ->nullable(false)->change();

            $table->string('unlinked')
                  ->nullable(false)->change();
        });
    }
}
