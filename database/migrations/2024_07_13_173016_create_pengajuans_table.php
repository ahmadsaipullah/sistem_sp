<?php

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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->unsignedBigInteger('dosen_id'); // Foreign key to dosen table
            $table->string('matkul_id');
            $table->integer('sks');
            $table->integer('harga');
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('verifikasi_prodi_id')->default(3);
            $table->unsignedBigInteger('verifikasi_akademik_id')->default(3);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('dosen_id')->references('id')->on('dosens')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
