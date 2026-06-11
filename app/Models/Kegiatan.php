<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';

    protected $fillable = [
        'user_id',
        'kategori_kegiatan_id',
        'lokasi_kegiatan_id',
        'bidang_id',
        'judul',
        'slug',
        'tanggal_kegiatan',
        'thumbnail',
        'deskripsi',
        'isi_lengkap',
        'status',
        'is_published',
        'published_at',
        'meta_description',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_kegiatan' => 'date',
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Kegiatan $kegiatan) {
            if (empty($kegiatan->slug)) {
                $kegiatan->slug = static::generateUniqueSlug($kegiatan->judul);
            }
        });

        static::updating(function (Kegiatan $kegiatan) {
            if ($kegiatan->isDirty('judul') && ! $kegiatan->isDirty('slug')) {
                $kegiatan->slug = static::generateUniqueSlug($kegiatan->judul, $kegiatan->id);
            }
        });

        static::deleting(function (Kegiatan $kegiatan) {
            if ($kegiatan->thumbnail && Storage::disk('public')->exists($kegiatan->thumbnail)) {
                Storage::disk('public')->delete($kegiatan->thumbnail);
            }
        });
    }

    public static function generateUniqueSlug(string $judul, ?int $exceptId = null): string
    {
        $slug = Str::slug($judul);
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

    public function publish(): void
    {
        $this->update([
            'status' => 'published',
            'is_published' => true,
            'published_at' => now(),
        ]);
    }

    public function unpublish(): void
    {
        $this->update([
            'status' => 'draft',
            'is_published' => false,
            'published_at' => null,
        ]);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriKegiatan::class, 'kategori_kegiatan_id');
    }

    public function lokasi(): BelongsTo
    {
        return $this->belongsTo(LokasiKegiatan::class, 'lokasi_kegiatan_id');
    }

    public function bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class);
    }

    public function dokumentasi(): HasMany
    {
        return $this->hasMany(DokumentasiKegiatan::class)->orderBy('sort_order');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('status', 'draft');
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query
            ->when($filters['keyword'] ?? null, function (Builder $q, string $keyword) {
                $q->where(function (Builder $inner) use ($keyword) {
                    $inner->where('judul', 'like', "%{$keyword}%")
                        ->orWhere('deskripsi', 'like', "%{$keyword}%")
                        ->orWhere('slug', 'like', "%{$keyword}%");
                });
            })
            ->when($filters['kategori_id'] ?? null, fn (Builder $q, $id) => $q->where('kategori_kegiatan_id', $id))
            ->when($filters['bidang_id'] ?? null, fn (Builder $q, $id) => $q->where('bidang_id', $id))
            ->when($filters['status'] ?? null, fn (Builder $q, $status) => $q->where('status', $status))
            ->when($filters['tanggal_dari'] ?? null, fn (Builder $q, $date) => $q->whereDate('tanggal_kegiatan', $date));
    }
}
