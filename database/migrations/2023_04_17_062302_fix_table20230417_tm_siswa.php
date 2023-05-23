<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixTable20230417TmSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tm_siswa', function (Blueprint $table) {
            $table->text('npsn_sekolahasal')->nullable()->change();
            $table->text('asal_sekolah')->nullable()->change();
            $table->text('no_ujian_sebelum')->nullable()->change();
            $table->text('no_ijasah')->nullable()->change();
            $table->text('ket_ijasah')->nullable()->change();
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
