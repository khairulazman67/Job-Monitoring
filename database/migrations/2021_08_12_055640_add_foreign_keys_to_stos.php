<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToStos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stos', function (Blueprint $table) {
            $table->foreign('id_sector','id_sector_fk3')->references('id')->
            on('sectors')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stos', function (Blueprint $table) {
            $table->dropForeign('id_sector_fk3');
        });
    }
}
