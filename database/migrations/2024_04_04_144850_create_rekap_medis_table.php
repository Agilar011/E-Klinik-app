<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_medis', function (Blueprint $table) {
            $table->id();
            $table->string('no_rekap_medis');
            $table->string('nip');
            $table->string('nip_dokter');
            $table->unsignedBigInteger('id_pengajuan');
            $table->string('qrcode');
            $table->string('surat_izin')->nullable();
            $table->timestamps();

            $table->foreign('id_pengajuan')->references('id')->on('pengajuan_check_ups')->onDelete('cascade');
            $table->foreign('nip')->references('nip')->on('users')->onDelete('cascade');
            $table->foreign('nip_dokter')->references('nip')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekap_medis');
    }
}
