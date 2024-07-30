<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Dados do usuário
        $userData = [
            'name' => 'Usuário de teste',
            'email' => 'teste@teste.com',
            'password' => bcrypt('123456'),
        ];

        // Verifica se o usuário já existe pelo email
        $existingUser = User::where('email', $userData['email'])->first();

        if ($existingUser) {
            // Atualiza os dados do usuário existente
            $existingUser->update($userData);
        } else {
            // Cria um novo usuário se não existir
            User::factory()->create($userData);
        }

        $this->call([
            PromotoresSeeder::class,
        ]);

    }
}
