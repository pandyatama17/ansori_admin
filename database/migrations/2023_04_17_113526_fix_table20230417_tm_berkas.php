<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixTable20230417TmBerkas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tm_berkas', function (Blueprint $table) {
            $table->bigInteger('id_siswa')->change();
            $table->longtext('pas_photo')->nullable()->change();
            $table->longtext('kk')->nullable()->change();
            $table->longtext('akta')->nullable()->change();
            $table->longtext('ijasah')->nullable()->change();
            $table->longtext('ktp_ayah')->nullable()->change();
            $table->longtext('ktp_ibu')->nullable()->change();
            $table->longtext('ktp_wali')->nullable()->change();
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
