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
            $table->integer('id_organizer');
            $table->string('nama_event');
            $table->date('tanggal');
            $table->text('detail');
            $table->decimal('harga');
            $table->integer('kontak');
            $table->rememberToken();
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
        Schema::dropIfExists('tbl_events');
    }
}
