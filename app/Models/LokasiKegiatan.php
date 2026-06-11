<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class LokasiKegiatan extends Model
{
    protected $table = 'lokasi_kegiatan';

    protected $fillable = [
        'nama',
        'slug',
        'alamat',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (LokasiKegiatan $lokasi) {
            if (empty($lokasi->slug)) {
                $lokasi->slug = static::generateUniqueSlug($lokasi->nama);
            }
        });

        static::updating(function (LokasiKegiatan $lokasi) {
            if ($lokasi->isDirty('nama') && ! $lokasi->isDirty('slug')) {
                $lokasi->slug = static::generateUniqueSlug($lokasi->nama, $lokasi->id);
            }
        });
    }

    public static function generateUniqueSlug(string $nama, ?int $exceptId = null): string
    {
        $slug = Str::slug($nama);
        $original = $slug;
        $counter = 1;

        while (static::query()
            ->when($exceptId, fn ($q) => $q->where('id', '!=', $exceptId))
            ->where('slug', $slug)
            ->exists()) {
            $slug = $original.'-'.$counter++;
        }

        return $slug;
    }

    public function kegiatan(): HasMany
    {
        return $this->hasMany(Kegiatan::class);
    }
}
