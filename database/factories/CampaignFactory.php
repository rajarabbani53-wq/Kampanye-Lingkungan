<?php

namespace database\factories;

use App\Models\Campaign;
use App\Models\User; // Penting untuk relasi user_id
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    protected $model = Campaign::class;

    public function definition(): array
    {
        // Menyediakan beberapa sampel gambar lokal terunggah di storage/app/public/gallery
        // Pastikan nama file ini ada di folder kamu, atau pakai string teks acak dahulu
        $dummyImages = ['gallery/dummy1.jpg', 'gallery/dummy2.jpg', 'gallery/dummy3.jpg'];

        return [
            // Mengaitkan campaign dengan User ID acak yang sudah ada di database
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(), 
            'title' => $this->faker->sentence(mt_rand(4, 8)), // Judul 4-8 kata
            'description' => $this->faker->paragraph(mt_rand(3, 6)), // Deskripsi 3-6 kalimat
            'category' => $this->faker->randomElement([
                'Aksi Bersih Sampah', 
                'Penanaman Pohon', 
                'Edukasi Lingkungan', 
                'Konservasi Air'
            ]),
            'image_path' => $this->faker->randomElement($dummyImages),
            'created_at' => $this->faker->dateTimeBetween('-1 months', 'now'),
            'updated_at' => now(),
        ];
    }
}