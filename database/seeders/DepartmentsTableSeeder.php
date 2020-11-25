<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'dept_code' => '3100',
                'name'      => 'Accounting'
            ],
            [
                'dept_code' => '3200',
                'name'      => 'Purchasing'
            ],
            [
                'dept_code' => '3300',
                'name'      => 'MIS'
            ],
            [
                'dept_code' => '3400',
                'name'      => 'Human Resource'
            ],
        ]);
    }
}
