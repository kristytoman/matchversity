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
        Schema::create(DatabaseNames::FIELDS_TABLE, function (Blueprint $table) {
            $table->string(DatabaseNames::FIELD_ID_COLUMN, 64);
            $table->primary(DatabaseNames::FIELD_ID_COLUMN);
            $table->string(DatabaseNames::NAME_COLUMN, 128);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DatabaseNames::FIELDS_TABLE);
    }
}
