<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stag_id');
            $table->string('title', 128)
                  ->nullable()
                  ->default(null);
            $table->string('faculty', 3);
            $table->string('lang', 2)
                  ->nullable()
                  ->default(null);
            $table->year('from')->default(null);
            $table->string('degree', 10)
                  ->nullable()
                  ->default(null);
            $table->boolean('fulltime')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
    }
}