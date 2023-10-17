<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
<<<<<<< HEAD
            'name' => 'Diether Besa',
            'email' => 'besadiether031@gmail.com',
=======
            'name' => 'Paul Fornillos',
            'email' => 'paul.fornillosb@gmail.com',
>>>>>>> 5dca0838832dbf0ee86a10eca7867867783771a0
            'password' => Hash::make('password'),
        ]);
    }
}
