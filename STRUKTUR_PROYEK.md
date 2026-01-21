# Struktur Proyek Portfolio Laravel

## Deskripsi
Proyek portfolio personal dengan Laravel yang menampilkan profil, skills, dan project-project.

---

## 📁 Struktur Folder

```
resources/
├── views/
│   ├── layouts/
│   │   └── app.blade.php          ← Master layout utama
│   ├── components/                ← Komponen reusable (untuk pengembangan)
│   ├── home.blade.php             ← Halaman home/portfolio
│   ├── project.blade.php          ← Halaman detail projects
│   └── welcome.blade.php          ← Halaman welcome
│
├── css/
│   ├── global.css                 ← CSS global untuk semua halaman
│   └── app.css                    ← CSS spesifik aplikasi
│
└── js/
    ├── app.js
    └── bootstrap.js
```

---

## 🎨 Arsitektur Layout

### Master Layout (`layouts/app.blade.php`)
File template utama yang mengelilingi semua halaman. Berisi:
- **Header**: Navigasi global dengan logo dan menu
- **Main**: Area konten utama (diisi oleh halaman child)
- **Footer**: Footer global

```blade
@section('title', '...')     ← Judul halaman
@section('styles')            ← CSS custom per halaman
@section('content')           ← Konten utama halaman
```

### Halaman-Halaman

| File | Deskripsi | Route |
|------|-----------|-------|
| `home.blade.php` | Dashboard portfolio utama | `/` |
| `project.blade.php` | Daftar projects detail | `/projects` |
| `welcome.blade.php` | Halaman welcome/intro | `/welcome` |

---

## 🎯 Konvensi Kode

### CSS Organization
```css
/* Sections diatur dengan comment block */
/* ========================================
   SECTION NAME
   ======================================== */
```

### Blade Template
```blade
@extends('layouts.app')              ← Extend master layout
@section('title', 'Page Title')      ← Set page title
@section('styles') ... @endsection   ← Custom styles
@section('content') ... @endsection  ← Page content
```

---

## 🎨 Color Scheme

| Warna | Hex | Penggunaan |
|-------|-----|-----------|
| Primary (Cyan) | `#00ffc8` | Heading, accent, hover |
| Background Dark | `#0a0e27` | Body background |
| Text Light | `#e5e7eb` | Text utama |
| Text Muted | `#b0b0b0` | Text sekunder |

---

## 📦 Component Structure (Future)

Untuk pengembangan ke depan, komponen dapat disimpan di:
```
resources/views/components/
├── project-card.blade.php
├── skill-item.blade.php
├── nav-menu.blade.php
└── ...
```

Digunakan sebagai:
```blade
<x-project-card :title="'Project Name'" />
```

---

## 🚀 Getting Started

### 1. Setup Initial
```bash
composer install
npm install
```

### 2. Run Dev Server
```bash
php artisan serve
npm run dev
```

### 3. Build Production
```bash
npm run build
```

---

## 📝 Cleanup yang Telah Dilakukan

✅ Menghapus file `portofolio.blade.php` (redundan)
✅ Mengintegrasikan portfolio ke `home.blade.php`
✅ Membuat master layout yang konsisten
✅ Menambahkan global CSS dengan struktur terorganisir
✅ Membuat folder `components/` untuk reusable components
✅ Menyederhanakan `welcome.blade.php`

---

## 🔧 Best Practices

- **DRY Principle**: Gunakan master layout untuk menghindari duplikasi
- **CSS Modular**: Pisahkan CSS per section/komponen
- **Blade Sections**: Gunakan `@section` untuk konten yang berbeda per halaman
- **Responsive Design**: CSS sudah include media queries
- **Performance**: CSS dikompilasi dan dioptimalkan di production

---

## 📚 Referensi

- [Laravel Blade Documentation](https://laravel.com/docs/blade)
- [CSS Best Practices](https://developer.mozilla.org/en-US/docs/Web/CSS)

---

**Last Updated**: January 21, 2026
**Version**: 1.0.0 (Cleaned & Organized)
