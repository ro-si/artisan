<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Assurez-vous que l'email est unique
            [
                'name' => 'Admin',
                'password' => Hash::make('securepassword'), // Utilisez un mot de passe sécurisé
                'role' => 'admin',
            ]
        );
    }
}
