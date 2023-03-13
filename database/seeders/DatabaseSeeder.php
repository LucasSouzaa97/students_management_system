<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory()->create([
             'name' => 'Lucas de Souza',
             'email' => 'admin@admin.com',
             'password' => Hash::make('admin123')
         ]);

        $this->call([
            ClassesSeeder::class,
        ]);
    }
}
