<?php

namespace App\Policies;

use App\Models\Bidang;
use App\Models\User;

class BidangPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Bidang $bidang): bool
    {
        return true;
    }

    public function delete(User $user, Bidang $bidang): bool
    {
        return true;
    }
}
