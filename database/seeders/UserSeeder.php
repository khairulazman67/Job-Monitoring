<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'NIK'=> '6720',
            'nama'=> 'admin',
            'email'=>'admin@gmail.com',
            'password'=> Hash::make('admin'),
            'level'=> 'admin',
            'remember_token'=>Str::random(60),
        ]); 
    }
}
