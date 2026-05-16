<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // Jalankan UserSeeder dahulu jika campaign membutuhkan user_id yang aktif
            UserSeeder::class, 
            CampaignSeeder::class, // <-- Taruh seeder campaign di sini
        ]);
    }
}