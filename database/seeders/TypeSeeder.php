<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        Type::create([
            'nama'=> 'PROMAN UNSPEC',
        ]); 
        Type::create([
            'nama'=> 'TA HD',
        ]); 
        Type::create([
            'nama'=> 'TA HD (HOMESPOT)',
        ]);
        Type::create([
            'nama'=> 'PROMAN BENJAR',
        ]); 
    }
}
