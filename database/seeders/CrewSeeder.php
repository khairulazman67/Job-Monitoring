<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Crew;
class CrewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Crew::create([
            'nama'=> 'F1DARTA2',
            'id_sector'=>2,]
        );
        Crew::create([
            'nama'=> 'F1DARTA3',
            'id_sector'=>2,]
        );
        Crew::create([
            'nama'=> 'F1DARTA4',
            'id_sector'=>2,]
        );
        Crew::create([
            'nama'=> 'F1DARTA5',
            'id_sector'=>2,]
        ); 

        Crew::create([
            'nama'=> 'F1LTM018',
            'id_sector'=>3,]
        ); 
        Crew::create([
            'nama'=> 'F1LTM022',
            'id_sector'=>3,]
        ); 
        Crew::create([
            'nama'=> 'F1LTM025',
            'id_sector'=>3,]
        ); 
        
    }
}
