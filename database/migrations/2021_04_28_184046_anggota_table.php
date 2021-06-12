<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->string('kd_anggota')->unique();
            $table->string('no_identitas')->unique();
            $table->string('status', 100);
            $table->string('nama_anggota', 100);
            $table->string('jkelamin', 100);
            $table->string('tempat_lahir', 100);
            $table->string('tgl_lahir', 100);
            $table->string('keanggotaan', 100);
            $table->string('gambar', 255);
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
        //
    }
}
