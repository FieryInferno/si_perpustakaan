<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // tabel katalog
        Schema::create('katalog', function (Blueprint $table) {

            $table->id();
            $table->string('bib_id')->unique();
            $table->string('judul_utama', 100);
            $table->string('judul_sub', 100);
            $table->string('pengarang', 100);
            $table->string('tempat_terbit', 100);
            $table->string('penerbit', 100);
            $table->string('thn_terbit', 100);
            $table->string('sampul_depan');
            $table->string('jumlah_hlm', 100);
            $table->string('dimensi');
            $table->string('edisi', 100)->nullable();
            $table->string('kelas_ddc', 100);
            $table->string('no_panggil', 100);
            $table->string('isbn', 100);
            $table->string('id_bahasa', 11)->nullable();
            $table->string('id_jenis_bahan', 11);
            $table->string('id_jenis_karya', 11);
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
        Schema::dropIfExists('katalog');
    }
}
