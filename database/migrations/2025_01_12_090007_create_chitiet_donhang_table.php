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
        Schema::create('chitiet_donhang', function (Blueprint $table) {
            $table->increments('id_ctdonhang');
            $table->string('tensp', 100);
            $table->tinyInteger('soluong')->nullable();
            $table->integer('giamgia')->nullable();
            $table->integer('giatien')->nullable();
            $table->integer('giakhuyenmai')->nullable();
            $table->integer('id_sanpham');
            $table->integer('id_dathang')->unsigned(); // Unsigned to match the data type of id_dathang in dathang table
            $table->integer('id_kh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitiet_donhang');
    }
};
