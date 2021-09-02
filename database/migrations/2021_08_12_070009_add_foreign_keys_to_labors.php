<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLabors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('labors', function (Blueprint $table) {
            $table->foreign('id_crew','id_crew_fk1')->references('id')->
            on('crews')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('labors', function (Blueprint $table) {
            $table->dropForeign('id_crew_fk4');
        });
    }
}
