<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblHargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hargas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_event');
            $table->foreign('id_event')->references('id')->on('tbl_events')->onDelete('cascade');
            $table->string('nama_harga');
            $table->double('harga');
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
        Schema::dropIfExists('tbl_hargas');
    }
}