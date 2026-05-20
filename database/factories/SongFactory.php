<?php

namespace Database\Factories;

use App\Models\Podcast;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre' => fake()->randomElement([
                'Midnight Echo',
                'Silent Road',
                'Blue Horizon',
                'Lost Signal',
                'Golden Rain',
                'Electric Dreams',
                'Broken Stars',
                'Ocean Light',
            ]),
            'artista' => fake()->name(),
            'podcast_id'=>Podcast::inRandomOrder()->first()->id,
        ];
    }
}