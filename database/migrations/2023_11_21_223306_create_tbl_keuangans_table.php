<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblKeuangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_keuangans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            $table->text('catatan');
            $table->string('jenis');
            $table->integer('total');
            $table->text('bukti');
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('tbl_events')->onDelete('cascade');
            $table->unsignedBigInteger('organizer_id');
            $table->foreign('organizer_id')->references('id')->on('tbl_organizers')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_keuangans');
    }
}