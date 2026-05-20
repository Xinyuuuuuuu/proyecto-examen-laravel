<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PodcastUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('podcast_user')->insert([
            [
                'user_id' => 1,
                'podcast_id' => 1
            ],
            [
                'user_id' => 1,
                'podcast_id' => 3
            ],
            [
                'user_id' => 2,
                'podcast_id' => 2
            ]
        ]);
    }
}
