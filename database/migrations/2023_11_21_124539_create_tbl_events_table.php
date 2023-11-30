<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_organizer');
            $table->unsignedBigInteger('id_kategori');
            $table->string('nama_event');
            $table->dateTime('waktu');
            $table->string('lokasi');
            $table->text('detail');
            $table->string('kontak');
            $table->string('thumbnail');
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_organizer')->references('id')->on('tbl_organizers')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id')->on('tbl_kategoris')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_events');
    }
}