<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_member');
            $table->foreign('id_member')->references('id')->on('tbl_members')->onDelete('cascade');
            $table->unsignedBigInteger('id_event');
            $table->foreign('id_event')->references('id')->on('tbl_events')->onDelete('cascade');
            $table->text('status');
            $table->text('bukti');
            $table->text('detail')->nullable();
            $table->unsignedBigInteger('id_harga');
            $table->foreign('id_harga')->references('id')->on('tbl_hargas')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_orders');
    }
}