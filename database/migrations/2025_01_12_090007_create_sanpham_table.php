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
        Schema::create('sanpham', function (Blueprint $table) {
            $table->integer('id_sanpham', true);
            $table->string('tensp', 100)->nullable();
            $table->string('anhsp')->nullable();
            $table->integer('giasp')->nullable();
            $table->text('mota')->nullable();
            $table->integer('giamgia')->nullable();
            $table->integer('giakhuyenmai')->nullable();
            $table->integer('soluong')->nullable();
            $table->integer('id_danhmuc')->index('fk_customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
};
