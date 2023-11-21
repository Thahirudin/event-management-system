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
            $table->integer('id_event');
            $table->integer('id_organizer');
            $table->date('tanggal');
            $table->text('catatan');
            $table->string('jenis');
            $table->integer('total');
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
