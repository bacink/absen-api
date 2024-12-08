<?php

use App\Models\Pppk;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create((new Pppk())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_urut');
            $table->string('nomor_peserta');
            $table->string('nik');
            $table->string('nama_lengkap');
            $table->string('jadwal');
            $table->string('lokasi');
            $table->string('sesi');
            $table->string('ruang');
            $table->text('signature')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists((new Pppk())->getTable());
    }
};
