<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Promotores;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PromotoresSeeder extends Seeder
{
    public function run()
    {
        $promotoresData = [
            [
                'email' => 'john@promotor.com',
                'nome' => 'Promotor John Doe',
                'telefone' => '1234567890',
                'img' => 'john_doe.png',
                'senha' => '123456'
            ],
            [
                'email' => 'jane@promotor.com',
                'nome' => 'Promotor Jane Smith',
                'telefone' => '0987654321',
                'img' => 'jane_smith.png',
                'senha' => '123456'
            ]
        ];

        foreach ($promotoresData as $data) {
            $this->createPromotorAndUser($data);
        }
    }

    private function createPromotorAndUser($data)
    {
        $promotor = Promotores::firstOrCreate(
            ['email' => $data['email']],
            [
                'nome' => $data['nome'],
                'telefone' => $data['telefone'],
                'img' => $data['img']
            ]
        );

        $user = User::firstOrCreate(
            ['email' => $promotor->email],
            [
                'name' => $promotor->nome,
                'password' => Hash::make($data['senha']),
                'role' => 'promoter'
            ]
        );

        // Associa o usuário com o promotor
        $promotor->user_id = $user->id;
        $promotor->save();
    }
}
