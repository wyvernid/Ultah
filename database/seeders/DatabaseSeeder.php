<?php

namespace Database\Seeders;

use App\Models\DownloadFile;
use App\Models\GalleryPhoto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DownloadFile::create([
            'title'       => 'Smol Gift',
            'description' => 'Cuma Bisa Kasih Ini, Maaf Kalau Jelek',
            'file_path'   => 'gallery/letter1.png',
            'file_type'   => 'png',
            'sort_order'  => 1,
        ]);
        DownloadFile::create([
            'title'       => 'Smol Gift',
            'description' => 'ini orinya',
            'file_path'   => 'gallery/letter2.png',
            'file_type'   => 'png',
            'sort_order'  => 1,
        ]);

        // Contoh foto galeri — ganti dengan foto aslimu
        GalleryPhoto::insert([
            ['title' => 'Foto 1', 'caption' => '', 'photo_path' => 'gallery/foto1.jpeg', 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Foto 2', 'caption' => '', 'photo_path' => 'gallery/foto2.jpeg', 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Foto 3', 'caption' => '', 'photo_path' => 'gallery/foto3.jpeg', 'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Foto 4', 'caption' => '', 'photo_path' => 'gallery/foto4.jpeg', 'sort_order' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Foto 5', 'caption' => '', 'photo_path' => 'gallery/foto5.jpeg', 'sort_order' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Foto 6', 'caption' => '', 'photo_path' => 'gallery/foto6.jpeg', 'sort_order' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Foto 7', 'caption' => '', 'photo_path' => 'gallery/foto7.jpeg', 'sort_order' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Foto 8', 'caption' => '', 'photo_path' => 'gallery/foto8.jpeg', 'sort_order' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Foto 9', 'caption' => '', 'photo_path' => 'gallery/foto9.jpeg', 'sort_order' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Foto 10', 'caption' => '', 'photo_path' => 'gallery/foto10.jpeg', 'sort_order' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Foto 11', 'caption' => '', 'photo_path' => 'gallery/foto11.jpeg', 'sort_order' => 11, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Foto 12', 'caption' => '', 'photo_path' => 'gallery/foto12.jpeg', 'sort_order' => 12, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Foto 13', 'caption' => '', 'photo_path' => 'gallery/foto13.jpeg', 'sort_order' => 13, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}