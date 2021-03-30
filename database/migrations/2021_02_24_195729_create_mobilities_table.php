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
        Schema::create('mobilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('university_id')
                  ->constrained('universities');
            $table->foreignId('user_id')
                  ->constrained('users');
            $table->date('arrival');
            $table->date('departure')
                  ->nullable()
                  ->default(null);
            $table->year('year');
            $table->boolean('is_summer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobilities');
    }
}
