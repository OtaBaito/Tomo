<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		DB::table('teams')->insert([
            'user_id' => 1,
            'name' => 'Tomodachi',
            'personal_team' => 0,
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
