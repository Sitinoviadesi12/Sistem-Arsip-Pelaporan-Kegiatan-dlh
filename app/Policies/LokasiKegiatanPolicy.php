<?php

namespace App\Policies;

use App\Models\LokasiKegiatan;
use App\Models\User;

class LokasiKegiatanPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, LokasiKegiatan $lokasiKegiatan): bool
    {
        return true;
    }

    public function delete(User $user, LokasiKegiatan $lokasiKegiatan): bool
    {
        return true;
    }
}
