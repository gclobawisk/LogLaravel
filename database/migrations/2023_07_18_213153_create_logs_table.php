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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuarioID')->nullable();
            $table->string('log_are', 30);
            $table->string('log_ip', 30)->nullable();
            $table->longText('log_des');
            $table->date('log_dat');
            $table->time('log_hor');
            $table->string('log_op', 30);
            $table->string('log_vin', 30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
