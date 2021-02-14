<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DatabaseNames::REASONS_TABLE, function (Blueprint $table) 
        {
            $table->id();
            $table->string(DatabaseNames::DESCRIPTION_COLUMN, 248);
            $table->boolean(DatabaseNames::IS_VERIFIED_COLUMN);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DatabaseNames::REASONS_TABLE);
    }
}
