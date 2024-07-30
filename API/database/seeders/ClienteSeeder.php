<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        Cliente::firstOrCreate(
            ['cnpj' => '12.345.678/0001-90'],
            [
                'nome' => 'Empresa Alpha',
                'endereco' => 'Rua A, 123',
                'estado' => 'SP',
                'imagem' => 'empresa_alpha.png',
            ]
        );

        Cliente::firstOrCreate(
            ['cnpj' => '98.765.432/0001-09'],
            [
                'nome' => 'Empresa Beta',
                'endereco' => 'Avenida B, 456',
                'estado' => 'RJ',
                'imagem' => 'empresa_beta.png',
            ]
        );
    }
}
