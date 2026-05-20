<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Xingyuan',
            'email' => 'xingyuan@correo.com',
            'password' => Hash::make('12345678')
        ]);
        User::create([
            'name' => 'Ane',
            'email' => 'ane@correo.com',
            'password' => Hash::make('password')
        ]);
    }
}
