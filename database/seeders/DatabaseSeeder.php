<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'raditrakawar1@gmail.com'],
            [
                'name' => 'rakha',
                'password' => Hash::make('ExamplePassword123!'),
            ]
        );

        $this->call(SkillsSeeder::class);
        $this->call(ProjectsSeeder::class);
    }
}
