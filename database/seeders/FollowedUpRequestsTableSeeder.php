<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class FollowedUpRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('followed_up_requests')->insert([
            [
                'request_id'                => 1,
                'target_date'               => "2020-11-25",
                'target_completion_date'    => "2020-11-25",
                'technician'                => "Fajar",
                'is_done'                   => "SELESAI"
            ],
            [
                'request_id'                => 2,
                'target_date'               => "2020-11-26",
                'target_completion_date'    => "2020-11-25",
                'technician'                => "Tec",
                'is_done'                   => "BATAL"
            ],
            [
                'request_id'                => 3,
                'target_date'               => "2020-11-26",
                'target_completion_date'    => "2020-11-25",
                'technician'                => "Tec",
                'is_done'                   => "BELUM SELESAI"
            ],
        ]);
    }
}
