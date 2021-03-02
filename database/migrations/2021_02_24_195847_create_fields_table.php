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
            $table->string('id', 64);
            $table->primary('id');
            $table->string('name', 128)
                  ->nullable()
                  ->default(null);
            $table->string('degree', 10)
                  ->nullable()
                  ->default(null);
            $table->string('faculty_id', 3);
            $table->foreign('faculty_id')
                  ->references('id')
                  ->on('faculties');
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
