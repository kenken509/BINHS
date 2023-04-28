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
        //\App\Models\User::factory(30)->create();

        \App\Models\User::factory()->create([
            'fName' => 'aries',
            'email' => 'kenortz@gmail.com',
            'phoneNumber' => '639191234567'
        ]);

        // \App\Models\Subject::factory(1)->create([
        //     'name' => 'HOME ECONOMIS'
        // ]);

        // \App\Models\Subject::factory(1)->create([
        //     'name' => 'ICT'
        // ]);

        // \App\Models\Subject::factory(1)->create([
        //     'name' => 'INDUSTRIAL ARTS'
        // ]);

        // \App\Models\Subject::factory(1)->create([
        //     'name' => 'SMAW'
        // ]);
    }
}
