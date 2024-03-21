<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pengajuan_check_ups', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nipdokter')->nullable();
            $table->unsignedBigInteger('idpoli');
            $table->string('qrcode')->default(null)->nullable();
            $table->date('tglpengajuan');
            $table->date('tglpemeriksaan')->nullable();
            $table->string('keluhan');
            $table->string('status');
            $table->text('catatan_dokter')->nullable();
            $table->timestamps();

            $table->foreign('nip')->references('nip')->on('users')->onDelete('cascade');
            $table->foreign('nipdokter')->references('nip')->on('users')->onDelete('cascade');
            $table->foreign('idpoli')->references('id')->on('polis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_check_ups');
    }
};
