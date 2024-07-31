<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Promotores;
use Illuminate\Support\Facades\Hash;

class PromotoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promotores::firstOrCreate(
            ['email' => 'john.doe@example.com'],
            [
                'nome' => 'John Doe',
                'senha' => Hash::make('password123'),
                'telefone' => '1234567890',
                'img' => 'john_doe.png',
            ]
        );

        Promotores::firstOrCreate(
            ['email' => 'jane.smith@example.com'],
            [
                'nome' => 'Jane Smith',
                'senha' => Hash::make('password123'),
                'telefone' => '0987654321',
                'img' => 'jane_smith.png',
            ]
        );
    }
}
