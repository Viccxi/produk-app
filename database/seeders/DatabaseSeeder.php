<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Penting: Kategori harus disiapkan dulu
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
