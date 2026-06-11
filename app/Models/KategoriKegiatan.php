<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class KategoriKegiatan extends Model
{
    protected $table = 'kategori_kegiatan';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
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
        static::creating(function (KategoriKegiatan $kategori) {
            if (empty($kategori->slug)) {
                $kategori->slug = static::generateUniqueSlug($kategori->nama);
            }
        });

        static::updating(function (KategoriKegiatan $kategori) {
            if ($kategori->isDirty('nama') && ! $kategori->isDirty('slug')) {
                $kategori->slug = static::generateUniqueSlug($kategori->nama, $kategori->id);
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
