<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Podcast;

class PodcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Podcast::create([
            'titulo'=>'Tecnología Hoy',
            'autor'=>'Ana Lopez',
        ]);

        Podcast::create([
            'titulo'=>'Música y Vida',
            'autor'=>'Carlos Ruiz',
        ]);

        Podcast::create([
            'titulo'=>'Noticias del Día',
            'autor'=>'Laura Gómez',
        ]);
    }
}
