<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(300)->create();

        $users = \App\Models\User::all()->shuffle(); // shuffle() will randomize the users.

        for ($i = 0; $i < 20; $i++) {
            \App\Models\Employer::factory()->create([ // create 20 employer and assosiate unique users onwers to it
                'user_id' => $users->pop()->id // pop will remove the assosiated user from the $users to grantee that just one unique user will be assosiated to the employer
            ]);
        }

        $employers = \App\Models\Employer::all();

        for ($i = 0; $i < 100; $i++) {
            \App\Models\Job::factory()->create([ // create 100 jobs and assosiate random employers to it (to have some jobs to the same employer)
                'employer_id' => $employers->random()->id
            ]);
        }
    }
}
