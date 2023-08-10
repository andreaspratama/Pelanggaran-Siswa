<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggarans', function (Blueprint $table) {
            $table->id();
            $table->text('thnakademik');
            $table->bigInteger('siswa_id');
            $table->bigInteger('kelas_id');
            $table->bigInteger('sub_id');
            $table->string('pelapor');
            $table->bigInteger('jnspelang_id');
            $table->text('catatan');
            $table->text('bukti');
            $table->string('unit');
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
        Schema::dropIfExists('pelanggarans');
    }
}
