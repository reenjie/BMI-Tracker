<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Week;
use App\Models\Day;


class mealplan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        for ($i=1; $i < 6 ; $i++) { 
            $week = Week::create([
                'week'=>$i,
            ]);

            for($j = 1; $j <8; $j++){
                Day::create([
                    'day'=>$j,
                    'weekid'=>$week->id,
                ]);
    
            }
          
            

        }



    }
}
