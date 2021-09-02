<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('no_Tiket');
            $table->bigInteger('id_sector')->unsigned();
            $table->bigInteger('id_crew')->unsigned();
            $table->bigInteger('id_STO')->unsigned();
            $table->string('ND');
            $table->string('nm_pelanggan');
            $table->bigInteger('id_tipeTiket')->unsigned();
            $table->string('DATEK');
            $table->enum('status',['kendala','reschedule','close']);
            $table->date('close_date')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
