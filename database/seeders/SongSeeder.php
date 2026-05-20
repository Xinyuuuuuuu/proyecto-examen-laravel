<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Song;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Song::create([
            'nombre' => 'Paint is Black',
            'artista' => 'The Rolling Stones',
            'podcast_id' => 1,
        ]);
        Song::create([
            'nombre' => 'Back in Back',
            'artista' => 'AC/DC',
            'podcast_id' => 1,
        ]);
        Song::create([
            'nombre' => 'Purple Rain',
            'artista' => 'Prince',
            'podcast_id' => 2,
        ]);
        Song::create ([
            'nombre'=>'Imagine',
            'artista'=>'John Lenon',
            'podcast_id'=>3,
        ]);
    }
}
