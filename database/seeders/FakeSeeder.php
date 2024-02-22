<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Recreate DB table + Seed
        // #> php artisan migrate:fresh --seed

        // User
        $user = User::factory()->createOne();

        // Pokemon
        Pokemon::factory()
            ->count(100)
            ->create([
                'user_id' => $user->id,
            ]);
    }
}
