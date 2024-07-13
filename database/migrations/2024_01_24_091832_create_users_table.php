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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('nim')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('no_hp');
            $table->unsignedBigInteger('level_id')->default(5); // Foreign key to levels table
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('gender');
            $table->unsignedBigInteger('dosen_id')->nullable();
            //relasi ke table levels
            $table->foreign('level_id')->references('id')->on('levels');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
