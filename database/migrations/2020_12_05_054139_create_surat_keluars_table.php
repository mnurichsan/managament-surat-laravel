<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('no_agenda');
            $table->text('tujuan');
            $table->string('no_surat');
            $table->text('isi');
            $table->string('kode');
            $table->date('tgl_surat');
            $table->date('tgl_catat');
            $table->string('file');
            $table->text('keterangan');
            $table->unsignedBigInteger('id_user');
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
        Schema::dropIfExists('surat_keluars');
    }
}
