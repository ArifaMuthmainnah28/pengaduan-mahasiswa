# 🎓 Aplikasi Pengaduan dan Aspirasi Mahasiswa

**Nama:Arifa Muthmainnah**
**NIM:2308107010012**

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- 

## Deskripsi Singkat Aplikasi

Aplikasi ini bertujuan untuk memfasilitasi mahasiswa dalam menyampaikan pengaduan dan aspirasi mereka secara digital kepada pihak kampus. Admin dapat melihat daftar pengaduan dan mengelola user & pengaduan. Aplikasi ini dibangun dengan Laravel, aplikasi ini mencakup fitur CRUD lengkap, validasi form, tampilan UI responsif, serta dukungan migration dan seeder untuk database.

-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## Penjelasan Code & User Interface

   ### Struktur Utama:
    - `routes/web.php`  
      Mendefinisikan route utama, termasuk:
      - Halaman utama (`/`)
      - CRUD untuk entitas pengaduan (`/pengaduans`)
      - Dashboard untuk admin dan user
    
    - `app/Models/Pengaduan.php`  
      Model Eloquent yang mewakili tabel `pengaduans`.
    
    - `app/Http/Controllers/PengaduanController.php`  
      Mengelola semua logika CRUD:
      - `index()` → Menampilkan daftar pengaduan  
      - `create()` & `store()` → Form dan simpan pengaduan baru  
      - `edit()` & `update()` → Edit dan simpan perubahan  
      - `destroy()` → Hapus pengaduan  
    
    - `resources/views/`  
      - `pengaduans/index.blade.php` -> Tabel pengaduan  
      - `pengaduans/create.blade.php` -> Form tambah pengaduan  
      - `pengaduans/edit.blade.php` -> Form edit  
      - `dashboard-user.blade.php` -> Tampilan dashboard user  
      - `dashboard-admin.blade.php` -> Tampilan dashboard admin
    
   ### Validasi
    Dilakukan di `store()` dan `update()` menggunakan `request()->validate([...])` untuk memastikan input tidak kosong dan sesuai aturan.
    
   ### UI
    Menggunakan **Bootstrap** untuk tampilan responsive dan bersih.  
    Admin dapat melihat daftar pengaduan yang masuk dengan status, dan mahasiswa dapat membuat laporan dengan mudah melalui form yang disediakan.

-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## Cara Instalasi Aplikasi

Ikuti langkah-langkah berikut untuk menjalankan aplikasi secara lokal:

   ### 1. Clone Repositori
    bash:
        git clone https://github.com/ArifaMuthmainnah28/pengaduan-mahasiswa.git
        cd pengaduan-mahasiswa

   ### 2. Install Dependency
    bash:
       composer install
       npm install && npm run dev

   ### 3. Konfigurasi Environment
    bash:
       cp .env.example .env
       php artisan key:generate

   ### 4. Buat dan Jalankan Migrasi + Seeder
    bash:
       php artisan migrate --seed

    Seeder akan menambahkan data awal seperti akun user dan pengaduan dummy.

   ### 5. Jalankan Aplikasi
    bash:
       php artisan serve

    Akses aplikasi di http://127.0.0.1:8000.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
