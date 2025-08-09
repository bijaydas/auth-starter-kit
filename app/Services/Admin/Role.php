<?php

declare(strict_types=1);

namespace App\Services\Admin;

use App\Enums\UserRole;
use Illuminate\Support\Facades\DB;

class Role
{
    public function seed(): void
    {
        $roles = UserRole::dbInsert();
        DB::table('roles')->insert($roles);
    }
}
