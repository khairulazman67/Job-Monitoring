<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('id_tipeTiket','id_tipeTiket_fk1')->references('id')->
            on('types')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('id_sector','id_sector_fk2')->references('id')->
            on('sectors')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('id_crew','id_crew_fk3')->references('id')->
            on('crews')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('id_STO','id_sto_fk1')->references('id')->
            on('stos')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('id_tipeTiket_fk1');
            $table->dropForeign('id_sector_fk2');
            $table->dropForeign('id_crew_fk3');
        });
    }
}
