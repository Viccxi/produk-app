# 🛍️ Haxovica Store

**Haxovica Store** adalah aplikasi web berbasis Laravel 12 yang dirancang untuk mempermudah pengelolaan data produk dan kategori.  
Fitur utama meliputi:
- Sistem autentikasi (Login & Register) dengan tambahan field No HP, Jenis Kelamin, dan Alamat.
- CRUD (Create, Read, Update, Delete) untuk Produk dan Kategori.
- Upload & Preview Gambar Produk.
- Relasi antar entitas (Produk — Kategori).
- Pencarian dan Pagination.
- Tampilan modern dengan tema **Dark Elegant Haxovica**.

---

## ⚙️ **Kebutuhan Sistem**
| Komponen | Versi Minimum |
|-----------|----------------|
| PHP | 8.2 |
| Laravel | 12.x |
| MySQL | 8.x |
| Composer | 2.x |
| Node.js & NPM | Terinstal |
| MAMP / XAMPP | untuk server lokal |
| Browser | Chrome / Edge / Firefox |

---

## 🖼️ **Tampilan**
| Halaman   | Cuplikan                                       |
| --------- | ---------------------------------------------- |
| Login     | ![Register](/Users/macbook/Documents/GitHub/produk-app/storage/screenshoots/register.png)         |
| Dashboard | ![Dashboard](/Users/macbook/Documents/GitHub/produk-app/storage/screenshoots/dashboard.png) |
| Produk    | ![Produk](/Users/macbook/Documents/GitHub/produk-app/storage/screenshoots/products.png)     |

---

## 🗂️ **Struktur Folder**
.
├── LICENSE
├── README.md
├── STRUCTURE.txt
├── app
│   ├── Http
│   ├── Models
│   ├── Providers
│   └── View
├── artisan
├── bootstrap
│   ├── app.php
│   ├── cache
│   └── providers.php
├── composer.json
├── composer.lock
├── config
│   ├── app.php
│   ├── auth.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── services.php
│   └── session.php
├── database
│   ├── factories
│   ├── migrations
│   └── seeders
├── package-lock.json
├── package.json
├── phpunit.xml
├── postcss.config.js
├── public
│   ├── css
│   ├── favicon.ico
│   ├── index.php
│   └── robots.txt
├── resources
│   ├── css
│   ├── js
│   ├── sass
│   └── views
├── routes
│   ├── auth.php
│   ├── console.php
│   └── web.php
├── tailwind.config.js
├── tests
│   ├── Feature
│   ├── Pest.php
│   ├── TestCase.php
│   └── Unit
└── vite.config.js

24 directories, 32 files

---

## 🗂️ **Struktur (ringkas)**
app/Http/Controllers/   → ProductController, CategoryController
app/Models/             → Product, Category, User
database/migrations/    → users, categories, products
database/seeders/       → DatabaseSeeder
resources/views/        → layouts/, products/, categories/
public/screenshots/     → gambar README

---

## 🚀 **Langkah Instalasi**

1. **Clone repository**
   ```bash
   git clone https://github.com/viccxi/produk-app.git
   cd produk-app

