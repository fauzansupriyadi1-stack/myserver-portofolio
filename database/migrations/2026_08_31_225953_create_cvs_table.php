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
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('Nama file CV');
            $table->string('file_path')->nullable()->comment('Path file CV di storage');
            $table->string('download_url')->nullable()->comment('URL download CV');
            $table->text('description')->nullable()->comment('Deskripsi CV');
            $table->boolean('is_active')->default(true)->comment('CV aktif atau tidak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cvs');
    }
};
