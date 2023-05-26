<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTingkatanAndKelasToTmSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tm_siswa', function (Blueprint $table) {
            $table->integer('tingkatan')->after('nama');
            $table->integer('kelas')->after('tingkatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tm_siswa', function (Blueprint $table) {
            $table->dropColumn('tingkatan');
            $table->dropColumn('kelas');
        });
    }
}
