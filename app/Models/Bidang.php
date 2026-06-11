<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $fillable = ['nama', 'slug', 'deskripsi'];

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
