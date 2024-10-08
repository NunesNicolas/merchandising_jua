<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            DefaultUsersSeeder::class,
            ClienteSeeder::class,
            PromotoresSeeder::class
        ]);

    }
}
