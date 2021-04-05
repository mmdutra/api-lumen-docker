<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *m
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'teste@email.com',
            'password' => Hash::make('senha123')
        ]);
    }
}
