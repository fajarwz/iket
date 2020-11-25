<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class RequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // faker untuk Indonesia
        $faker = Faker::create('id_ID');
        
        for($i = 1 ; $i <= 3 ; $i++){
        	DB::table('requests')->insert([
                [
                    'request_created_date' => $faker->date,
                    'client_name' => $faker->name,
                    'department_id' => 3100,
                    'computer_id' => 1,
                    'break_id' => 1,
                    'kind_of_repair' => 'PERBAIKAN',
                    'description' => $faker->sentence(),
                ],
            ]);
        }
    }
}
