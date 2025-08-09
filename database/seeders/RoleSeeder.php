<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Services\Admin\Role as RoleService;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app(RoleService::class)->seed();
    }
}
