<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Elektronik',
            'Fashion',
            'Peralatan Rumah Tangga',
            'Kesehatan & Kecantikan',
            'Olahraga',
            'Makanan & Minuman',
            'Aksesoris',
            'Otomotif',
            'Gaming',
            'Alat Tulis & Kantor',
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
