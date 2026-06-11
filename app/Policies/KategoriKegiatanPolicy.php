<?php

namespace App\Policies;

use App\Models\KategoriKegiatan;
use App\Models\User;

class KategoriKegiatanPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, KategoriKegiatan $kategoriKegiatan): bool
    {
        return true;
    }

    public function delete(User $user, KategoriKegiatan $kategoriKegiatan): bool
    {
        return true;
    }
}
