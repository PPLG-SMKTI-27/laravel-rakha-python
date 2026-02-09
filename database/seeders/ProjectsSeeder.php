<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'judul_project' => 'Website E-commerce',
                'deskripsi' => 'Sebuah platform e-commerce lengkap dengan fitur keranjang belanja, pembayaran, dan manajemen produk.',
                'teknologi' => json_encode(['PHP', 'Laravel', 'MySQL', 'Bootstrap']),
                'link_project' => 'https://example-ecommerce.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_project' => 'Aplikasi Todo List',
                'deskripsi' => 'Aplikasi sederhana untuk mengelola daftar tugas harian dengan fitur tambah, edit, dan hapus.',
                'teknologi' => json_encode(['JavaScript', 'React', 'Node.js']),
                'link_project' => 'https://example-todo.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_project' => 'Sistem Manajemen Inventori',
                'deskripsi' => 'Sistem untuk melacak stok barang, pemasukan, dan pengeluaran inventori.',
                'teknologi' => json_encode(['PHP', 'Laravel', 'PostgreSQL']),
                'link_project' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_project' => 'Blog Pribadi',
                'deskripsi' => 'Website blog dengan fitur posting artikel, komentar, dan kategori.',
                'teknologi' => json_encode(['HTML', 'CSS', 'JavaScript', 'WordPress']),
                'link_project' => 'https://myblog.example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
