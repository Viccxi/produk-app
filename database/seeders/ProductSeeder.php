<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            $this->command->warn('Tidak ada kategori! Jalankan CategorySeeder dulu.');
            return;
        }

        // Daftar produk per kategori
        $productList = [
            'Elektronik' => [
                ['name' => 'Smartphone Android', 'price' => 2500000, 'description' => 'Ponsel pintar dengan kamera 48MP dan baterai tahan lama.'],
                ['name' => 'Laptop HaxovicaBook', 'price' => 7500000, 'description' => 'Laptop ringan untuk kerja dan hiburan.'],
                ['name' => 'Headset Bluetooth', 'price' => 350000, 'description' => 'Headset nirkabel dengan kualitas suara jernih.'],
            ],
            'Fashion' => [
                ['name' => 'Kaos Polos Haxovica', 'price' => 80000, 'description' => 'Kaos polos katun premium warna hitam elegan.'],
                ['name' => 'Jaket Hoodie Street', 'price' => 180000, 'description' => 'Hoodie nyaman untuk gaya santai dan kasual.'],
                ['name' => 'Sepatu Sneakers Hitam', 'price' => 320000, 'description' => 'Sepatu ringan dengan desain modern.'],
            ],
            'Peralatan Rumah Tangga' => [
                ['name' => 'Blender Serbaguna', 'price' => 450000, 'description' => 'Blender listrik dengan pisau stainless steel tajam.'],
                ['name' => 'Set Panci Anti Lengket', 'price' => 600000, 'description' => 'Set panci 3 ukuran untuk dapur modern.'],
            ],
            'Kesehatan & Kecantikan' => [
                ['name' => 'Serum Wajah Glow', 'price' => 95000, 'description' => 'Serum vitamin C untuk kulit sehat bercahaya.'],
                ['name' => 'Masker Spirulina', 'price' => 50000, 'description' => 'Masker alami untuk perawatan kulit wajah.'],
            ],
            'Olahraga' => [
                ['name' => 'Matras Yoga Premium', 'price' => 120000, 'description' => 'Matras yoga anti-slip dengan ketebalan ideal.'],
                ['name' => 'Sepeda Lipat Xtreme', 'price' => 2200000, 'description' => 'Sepeda lipat ringan cocok untuk mobilitas tinggi.'],
            ],
            'Makanan & Minuman' => [
                ['name' => 'Kopi Hitam Nusantara', 'price' => 65000, 'description' => 'Kopi robusta pilihan dari dataran tinggi Indonesia.'],
                ['name' => 'Coklat Almond Crunch', 'price' => 45000, 'description' => 'Coklat manis dengan potongan almond renyah.'],
            ],
            'Aksesoris' => [
                ['name' => 'Gelang Kulit Pria', 'price' => 55000, 'description' => 'Gelang kulit asli dengan desain maskulin.'],
                ['name' => 'Topi Baseball Haxovica', 'price' => 70000, 'description' => 'Topi hitam bergaya minimalis khas Haxovica.'],
            ],
            'Otomotif' => [
                ['name' => 'Helm Full Face Racing', 'price' => 450000, 'description' => 'Helm aman dan bergaya untuk pengendara motor.'],
                ['name' => 'Sarung Tangan Motor', 'price' => 85000, 'description' => 'Sarung tangan kulit nyaman dan kuat.'],
            ],
            'Gaming' => [
                ['name' => 'Mouse Gaming RGB', 'price' => 230000, 'description' => 'Mouse dengan sensor presisi dan lampu RGB.'],
                ['name' => 'Keyboard Mekanik HaxoKey', 'price' => 550000, 'description' => 'Keyboard dengan switch tactile premium.'],
                ['name' => 'Kursi Gaming Comfort X', 'price' => 1200000, 'description' => 'Kursi gaming ergonomis dengan sandaran leher.'],
            ],
            'Alat Tulis & Kantor' => [
                ['name' => 'Notebook Kulit Elegan', 'price' => 65000, 'description' => 'Buku catatan kulit sintetis bergaya profesional.'],
                ['name' => 'Pulpen Tinta Gel Hitam', 'price' => 15000, 'description' => 'Pulpen tinta gel lancar untuk menulis cepat.'],
            ],
        ];

        // Insert produk sesuai kategori
        foreach ($categories as $category) {
            if (isset($productList[$category->name])) {
                foreach ($productList[$category->name] as $prod) {
                    Product::create([
                        'name' => $prod['name'],
                        'description' => $prod['description'],
                        'price' => $prod['price'],
                        'category_id' => $category->id,
                    ]);
                }
            }
        }
    }
}
