<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => "Yapi",
            'email' => "theodoreyapi@gmail.com",
            'phone' => "0585831647",
            'prenom' => "kouassi",
            'type_user' => "super",
            'directeur_id' => null,
            'entreprise_id' => null,
            'password' => Hash::make("1234567890"),
        ]);
    }
}
