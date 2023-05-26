<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNopenToTmSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tm_siswa', function (Blueprint $table) {
            $table->text('nis')->nullable()->change();
            $table->text('nopen');
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
            $table->dropColumn('nopen');
        });
    }
}
