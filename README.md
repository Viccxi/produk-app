<h1 align="center">🛍️ Haxovica Store</h1>
<p align="center">
  <b>Aplikasi Web Laravel 12 dengan Tema Dark Elegant</b><br>
  CRUD Produk & Kategori • Upload Gambar • Pagination • Auth Kustom
</p>

<p align="center">
  <img src="public/screenshots/preview.png" width="80%" alt="Haxovica Store Preview">
</p>

<p align="center">
  <a href="https://github.com/Viccxi/produk-app/blob/main/LICENSE">
    <img src="https://img.shields.io/github/license/Viccxi/produk-app?color=ff6f61&style=for-the-badge">
  </a>
  <a href="https://github.com/Viccxi/produk-app/stargazers">
    <img src="https://img.shields.io/github/stars/Viccxi/produk-app?color=ff6f61&style=for-the-badge">
  </a>
  <a href="https://github.com/Viccxi/produk-app">
    <img src="https://img.shields.io/badge/Laravel-12.x-ff6f61?style=for-the-badge&logo=laravel&logoColor=white">
  </a>
  <a href="#">
    <img src="https://img.shields.io/badge/Status-Active-ff6f61?style=for-the-badge">
  </a>
</p>

---

## 🧾 Deskripsi

**Haxovica Store** adalah aplikasi web berbasis **Laravel 12** untuk mengelola data produk dan kategori.  
Aplikasi ini dikembangkan dengan arsitektur **MVC Laravel** dan tampilan bertema **Dark Elegant Haxovica**, modern serta responsif.  

### ✨ Fitur Utama
- 🔐 **Login & Register Custom** (Nama, Email, Password, No HP, Jenis Kelamin, Alamat)
- 📦 **CRUD Produk & Kategori**
- 🖼️ **Upload dan Preview Gambar Produk**
- 🔍 **Pencarian dan Pagination**
- 💾 **Relasi antar entitas (Produk ↔ Kategori)**
- 🎨 **Tema Gelap Modern dengan warna utama #ff6f61**

---

## ⚙️ Kebutuhan Sistem

| Komponen | Versi Minimum |
|-----------|----------------|
| PHP | 8.2 |
| Laravel | 12.x |
| MySQL | 8.x |
| Composer | 2.x |
| Node.js & NPM | Terinstal |
| MAMP / XAMPP | Server lokal |
| Browser | Chrome / Edge / Firefox |

---

## 🖼️ Tampilan

| Halaman | Cuplikan |
|----------|-----------|
| **Login** | ![Login](public/screenshots/login.png) |
| **Dashboard** | ![Dashboard](public/screenshots/dashboard.png) |
| **Produk** | ![Produk](public/screenshots/products.png) |

> 📸 Simpan screenshot kamu di folder `public/screenshots/` agar otomatis muncul di README.

---

## 🗂️ Struktur Folder

```bash
.
├── LICENSE
├── README.md
├── app
│   ├── Http
│   │   └── Controllers
│   ├── Models
│   └── Providers
├── database
│   ├── factories
│   ├── migrations
│   └── seeders
├── public
│   ├── css
│   ├── screenshots
│   │   ├── preview.png
│   │   ├── login.png
│   │   ├── dashboard.png
│   │   └── products.png
│   └── index.php
├── resources
│   ├── css
│   ├── js
│   └── views
│       ├── layouts
│       ├── products
│       └── categories
├── routes
│   ├── web.php
│   └── auth.php
└── vite.config.js
