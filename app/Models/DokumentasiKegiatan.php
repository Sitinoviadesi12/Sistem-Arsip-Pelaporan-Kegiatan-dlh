<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class DokumentasiKegiatan extends Model
{
    protected $table = 'dokumentasi_kegiatan';

    protected $fillable = [
        'kegiatan_id',
        'file_path',
        'original_name',
        'file_size',
        'sort_order',
    ];

    protected static function booted(): void
    {
        static::deleting(function (DokumentasiKegiatan $dokumentasi) {
            if (Storage::disk('public')->exists($dokumentasi->file_path)) {
                Storage::disk('public')->delete($dokumentasi->file_path);
            }
        });
    }

    public function kegiatan(): BelongsTo
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function getUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->file_path);
    }
}
