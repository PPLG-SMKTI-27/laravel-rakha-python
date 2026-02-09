<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skills')->insert([
            [
                'name' => 'PHP',
                'description' => 'Bahasa pemrograman server-side untuk pengembangan web.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'JavaScript',
                'description' => 'Bahasa pemrograman untuk pengembangan web frontend dan backend.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laravel',
                'description' => 'Framework PHP untuk membangun aplikasi web yang elegan dan ekspresif.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HTML',
                'description' => 'Bahasa markup untuk struktur halaman web.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'CSS',
                'description' => 'Bahasa stylesheet untuk mendesain tampilan halaman web.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
