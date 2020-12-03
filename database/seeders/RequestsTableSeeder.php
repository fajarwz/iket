<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        // for($i = 1 ; $i <= 3 ; $i++){
        	DB::table('requests')->insert([
                [
                    'request_created_date'  => "2020-11-23",
                    'client_id'             => 1,
                    'computer_id'           => 1,
                    'break_id'              => 1,
                    'kind_of_repair'        => 'PERBAIKAN',
                    'description'           => $faker->sentence(),
                ],
                [
                    'request_created_date'  => "2020-11-24",
                    'client_id'             => 1,
                    'computer_id'           => 2,
                    'break_id'              => 2,
                    'kind_of_repair'        => 'PERBAIKAN',
                    'description'           => $faker->sentence(),
                ],
                [
                    'request_created_date'  => "2020-11-23",
                    'client_id'             => 1,
                    'computer_id'           => 3,
                    'break_id'              => 1,
                    'kind_of_repair'        => 'FASILITAS',
                    'description'           => $faker->sentence(),
                ],
            ]);
        // }
    }
}
