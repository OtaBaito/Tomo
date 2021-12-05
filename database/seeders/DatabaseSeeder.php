<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		Team::create([
            'user_id' => 1,
            'name' => 'Tomodachi',
            'personal_team' => 0,
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
