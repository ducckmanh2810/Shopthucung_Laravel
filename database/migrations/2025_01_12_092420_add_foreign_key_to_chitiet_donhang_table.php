<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chitiet_donhang', function (Blueprint $table) {
            $table->foreign('id_dathang')
                  ->references('id_dathang')
                  ->on('dathang')
                  ->onUpdate('restrict')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chitiet_donhang', function (Blueprint $table) {
            $table->dropForeign(['id_dathang']);
        });
    }
};
