<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Media;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Media::create([
            'user_id' => 1,
            'filename' => 'product.jpg',
            'disk' => 'public',
            'thumbnail' => 'placeholder/product.jpg',
            'path' => 'placeholder/product.jpg',
        ]);
    }
}
