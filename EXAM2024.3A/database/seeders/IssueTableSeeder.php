<?php

namespace Database\Seeders;

use App\Models\Computer;
use App\Models\Issue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class IssueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $computerIds = Computer::pluck('id')->toArray();
        for($i = 0 ; $i<50;$i++){
            Issue::create([
                'computer_id' => $faker->randomElement($computerIds),
                'reported_by' => $faker->userName,
                'reported_date' => $faker->dateTime,
                'description' => $faker->text,
                'urgency' => $faker->randomElement(['Low','Medium','High']),
                'status' => $faker->randomElement(['Open','In Progress','Resolved'])

            ]);
         }
    }
}
