<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BreaksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('breaks')->insert([
            [
                'name'          => 'CPU'
            ],
            [
                'name'          => 'Jaringan'
            ],
            [
                'name'          => 'Internet'
            ],
            [
                'name'          => 'Sistem Operasi'
            ],
            [
                'name'          => 'Program/Aplikasi'
            ],
            [
                'name'          => 'Printer'
            ]
        ]);
    }
}
