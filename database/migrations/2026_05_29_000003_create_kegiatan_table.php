<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kategori_kegiatan_id')->constrained('kategori_kegiatan')->cascadeOnDelete();
            $table->foreignId('lokasi_kegiatan_id')->constrained('lokasi_kegiatan')->cascadeOnDelete();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->date('tanggal_kegiatan');
            $table->string('thumbnail')->nullable();
            $table->text('deskripsi');
            $table->longText('isi_lengkap')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();

            $table->index('status');
            $table->index('is_published');
            $table->index('tanggal_kegiatan');
            $table->index('published_at');
            $table->index(['kategori_kegiatan_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
