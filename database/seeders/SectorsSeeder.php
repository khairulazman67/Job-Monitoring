<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sector;

class SectorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sector::truncate();
        Sector::create(
            ['nama'=> 'BANDA ACEH'],
        ); 
        Sector::create(
            ['nama'=> 'DARUSSALAM'],
        ); 
        Sector::create(
            ['nama'=> 'LAMTEUMEN'],
        ); 
        Sector::create(
            ['nama'=> 'LAMBARO'],
        );
        Sector::create(
            ['nama'=> 'SIGLI'],
        );
        Sector::create(
            ['nama'=> 'BIREUEN'],
        ); 
        Sector::create(
            ['nama'=> 'TAKENGON'],
        );
        Sector::create(
            ['nama'=> 'KRUENG GEUKUH'],
        );
        Sector::create(
            ['nama'=> 'LHOKSEUMAWE'],
        );
        Sector::create(
            ['nama'=> 'LHOKSUKON'],
        );
        Sector::create(
            ['nama'=> 'LANGSA'],
        );
        Sector::create(
            ['nama'=> 'KUALA SIMPANG'],
        );
        Sector::create(
            ['nama'=> 'MEULABOH'],
        );
        Sector::create(
            ['nama'=> 'BLANG PIDIE'],
        );
        Sector::create(
            ['nama'=> 'WILSUS - SUS'],
        );
        Sector::create(
            ['nama'=> 'WILSUS - SKL'],
        );
        Sector::create(
            ['nama'=> 'WILSUS - LNO'],
        );
        Sector::create(
            ['nama'=> 'WILSUS - SAB'],
        );
        Sector::create(
            ['nama'=> 'WILSUS - TSE'],
        );
        Sector::create(
            ['nama'=> 'WILSUS - IDI'],
        );
        Sector::create(
            ['nama'=> 'WILSUS - KTN'],
        );
        Sector::create(
            ['nama'=> 'WILSUS - BKJ'],
        );
        Sector::create(
            ['nama'=> 'WILSUS - SNA'],
        );
        
    }
}
