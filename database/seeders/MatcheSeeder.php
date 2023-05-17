<?php

namespace Database\Seeders;

use App\Models\Matches;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatcheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $matches = [
            ['country_one'=>'Malaysia', 'country_two'=>'Indonesia', 'time'=> "5:00", 'event_id'=>2],
            ['country_one'=>'Myanmar', 'country_two'=>'Philippines', 'time'=> "5:00", 'event_id'=>2],
            ['country_one'=>'Singapore', 'country_two'=>'Viet Nam', 'time'=> "6:00", 'event_id'=>5],
            ['country_one'=>'Vetnam', 'country_two'=>'Indonesia', 'time'=> "3:00", 'event_id'=>4],
            ['country_one'=>'Thailand', 'country_two'=>'Indonesia', 'time'=> "5:00", 'event_id'=>4],
        ];
        foreach($matches as $match){
            Matches::create($match);
        }
    }
}
