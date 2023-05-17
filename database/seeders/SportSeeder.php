<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sport;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $sports = [
            ['sport_name'=>'Football'],
            ['sport_name'=>'Boxing'],
            ['sport_name'=>'Basketball'],
            ['sport_name'=>'Jujutsu'],
            ['sport_name'=>'Kun Khmer'],
            ['sport_name'=>'Kun bokator'],
            ['sport_name'=>'Swimming'],
            ['sport_name'=>'Tennis'],
            ['sport_name'=>'Volleyball'],
            ['sport_name'=>'Wushu']
        ];
        foreach($sports as $sport){
            Sport::create($sport);
        }
    }
}
