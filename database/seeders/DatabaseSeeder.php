<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\CattleTypeSeeder;
use Database\Seeders\OwnershipSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // CattleTypeSeed::class,
            OwnershipSeeder::class
        ]);
    }
}
