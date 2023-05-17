<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stadiums;

class StadiumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $stadiums = [
            ['stadium_name'=>'Morodok Techo National Stadium','zone_A'=>500,'zone_B'=>600],
            ['stadium_name'=>'Olympic Stadium','zone_A'=>300,'zone_B'=>400]
        ];
        foreach($stadiums as $stadium){
            Stadiums::create($stadium);
        }
    }
}
