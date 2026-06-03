<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nome' => 'Admin',
            'login' => 'auto@gmail.com',
            'senha' => bcrypt('auto2026'),
        ]);
    }
}