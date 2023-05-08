<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' =>'ariq',
            'name' =>'ariqbagus',
            'telepon' =>'12312312',
            'alamat' =>'12312312',
            'role' => '1',
            'password' =>hash::make('1234'),
            'email' =>'ariqbagus@gmail.com',
        ]);
    }
}
