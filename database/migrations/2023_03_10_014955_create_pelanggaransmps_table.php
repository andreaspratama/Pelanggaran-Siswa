<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggaransmpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggaransmps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('siswa_id');
            $table->bigInteger('kelas_id');
            $table->bigInteger('sub_id');
            $table->string('pelapor');
            $table->bigInteger('wk_id');
            $table->bigInteger('jnspelang_id');
            $table->text('catatan');
            $table->string('point');
            $table->text('bukti');
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
        Schema::dropIfExists('pelanggaransmps');
    }
}
