<?php

namespace Database\Seeders;

use App\Models\Computer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ComputerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $processor = ['AMD 5700H','AMD 5600H','AMD 5800U','AMD 5700U','Intel Core i5-11400','Intel Core i7-11800h','Intel Core i9-14900hx'];
        $os = ['Windows 10 Pro','Ubuntu 22.04','Ubuntu 22.06','Ubuntu 19.08','Mac OS 2','Mac OS 1','Windows 11 Pro','Windows 7','Window XP','Window 8'];
        $model = ['Dell Optiplex 7090','Asus Zenbook 2023','MacBook pro 2023','Mac Book 2023','Legion 5','Legion 5 Pro','Legion 7i','Legion AMD',
        'Legion Go 5','Apple Desk','HP Zen 1','HP Vision','Asus Gaming TUF 2023','Asus Gaming 2021','Dell Latitude 2019','Dell LAtitude 7058'];
        for($i = 0 ; $i<20;$i++){
            Computer::create([
                'computer_name' => $faker->lexify('Lab#-PC##'),
                'model' => $faker->randomElement($model),
                'operating_system' => $faker->randomElement($os),
                'processor'=> $faker->randomElement($processor),
                'memory'=>$faker->numberBetween(1,32),
                'available'=>$faker->boolean()
                
            ]);
         }
    }
}
