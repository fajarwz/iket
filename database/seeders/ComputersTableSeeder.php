<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('computers')->insert([
            [
                'ip'            => '192.168.1.25',
                'comp_name'     => 'Fajar-PC',
                'user_name'     => 'fajar',
            ],
            [
                'ip'            => '192.168.1.29',
                'comp_name'     => 'fajarw-PC',
                'user_name'     => 'fajarw',
            ],
            [
                'ip'            => '192.168.1.35',
                'comp_name'     => 'fajarwz-PC',
                'user_name'     => 'fajarwz',
            ]
        ]);
    }
}
