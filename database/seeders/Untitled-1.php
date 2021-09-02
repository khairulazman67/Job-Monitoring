<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sto;

class STOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sto::truncate();
        //Banda Aceh
        Sto::create(
            ['id_sector' => '1',
            'nama'=> 'BNA',],
        ); 
        //Darussalam
        Sto::create(
            ['id_sector' => '2',
            'nama'=> 'DAR',],
        ); 
        //Lamteumen
        Sto::create(
            ['id_sector' => '3',
            'nama'=> 'LOA',],
        ); 
        Sto::create(
            ['id_sector' => '3',
            'nama'=> 'LTM',],
        ); 
        //Lambaro
        Sto::create(
            ['id_sector' => '4',
            'nama'=> 'LBR',],
        ); 
        Sto::create(
            ['id_sector' => '4',
            'nama'=> 'SMM',],
        ); 
        Sto::create(
            ['id_sector' => '4',
            'nama'=> 'JHO',],
        ); 
        //Sigli
        Sto::create(
            ['id_sector' => '5',
            'nama'=> 'SGI',],
        ); 
        Sto::create(
            ['id_sector' => '5',
            'nama'=> 'BNN',],
        ); 
        Sto::create(
            ['id_sector' => '5',
            'nama'=> 'MRU',],
        ); 
        Sto::create(
            ['id_sector' => '5',
            'nama'=> 'SLG',],
        ); 
        //Bireun
        Sto::create(
            ['id_sector' => '6',
            'nama'=> 'BIR',],
        ); 
        Sto::create(
            ['id_sector' => '6',
            'nama'=> 'MGD',],
        ); 
        Sto::create(
            ['id_sector' => '7',
            'nama'=> 'TKN',],
        ); 
        Sto::create(
            ['id_sector' => '8',
            'nama'=> 'KGH',],
        ); 
        Sto::create(
            ['id_sector' => '9',
            'nama'=> 'LSM',],
        ); 
        Sto::create(
            ['id_sector' => '10',
            'nama'=> 'GEU',],
        ); 
        Sto::create(
            ['id_sector' => '10',
            'nama'=> 'LSK',],
        ); 
        Sto::create(
            ['id_sector' => '10',
            'nama'=> 'MKL',],
        ); 
        Sto::create(
            ['id_sector' => '10',
            'nama'=> 'PTL',],
        ); 
        Sto::create(
            ['id_sector' => '11',
            'nama'=> 'LGS',],
        ); 
        Sto::create(
            ['id_sector' => '12',
            'nama'=> 'KSG',],
        ); 
        Sto::create(
            ['id_sector' => '13',
            'nama'=> 'CAG',],
        ); 
        Sto::create(
            ['id_sector' => '13',
            'nama'=> 'MBO',],
        ); 
        Sto::create(
            ['id_sector' => '13',
            'nama'=> 'JRM',],
        ); 
        Sto::create(
            ['id_sector' => '14',
            'nama'=> 'BAK',],
        ); 
        Sto::create(
            ['id_sector' => '14',
            'nama'=> 'KFR',],
        ); 
        Sto::create(
            ['id_sector' => '14',
            'nama'=> 'BPD',],
        ); 
        Sto::create(
            ['id_sector' => '14',
            'nama'=> 'TTN',],
        ); 
        Sto::create(
            ['id_sector' => '15',
            'nama'=> 'SUS',],
        ); 
        Sto::create(
            ['id_sector' => '16',
            'nama'=> 'SKL',],
        ); 
        Sto::create(
            ['id_sector' => '17',
            'nama'=> 'LNO',],
        ); 
        Sto::create(
            ['id_sector' => '18',
            'nama'=> 'SAB',],
        ); 

        Sto::create(
            ['id_sector' => '19',
            'nama'=> 'TSE',],
        ); 
        Sto::create(
            ['id_sector' => '20',
            'nama'=> 'PRL',],
        ); 
        Sto::create(
            ['id_sector' => '20',
            'nama'=> 'IDI',],
        ); 
        Sto::create(
            ['id_sector' => '20',
            'nama'=> 'SPU',],
        ); 
        Sto::create(
            ['id_sector' => '21',
            'nama'=> 'KTN',],
        ); 
        Sto::create(
            ['id_sector' => '22',
            'nama'=> 'BKJ',],
        ); 
        Sto::create(
            ['id_sector' => '23',
            'nama'=> 'SNA',],
        ); 
    }
}
