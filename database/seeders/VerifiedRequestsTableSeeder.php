<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class VerifiedRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('verified_requests')->insert([
            [
                'followed_up_request_id'    => 1,
                'is_verified'               => "BELUM"
            ],
            [
                'followed_up_request_id'    => 2,
                'is_verified'               => "BELUM"
            ],
            [
                'followed_up_request_id'    => 3,
                'is_verified'               => "BELUM"
            ],
        ]);
    }
}
