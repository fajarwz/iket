<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'      => 'User',
                'username'  => 'user',
                'password'  => Hash::make('user'),
                'dept_code' => 3200,
                'role'      => 'USER'
            ],
            [
                'name'      => 'Tec',
                'username'  => 'tec',
                'password'  => Hash::make('tec'),
                'dept_code' => 3300,
                'role'     => 'TECHNICIAN'
            ],
            [
                'name'      => 'Man',
                'username'  => 'man',
                'password'  => Hash::make('man'),
                'dept_code' => 3300,
                'role'      => 'MANAGER'
            ],
            [
                'name'      => 'Fajar',
                'username'  => 'fajar',
                'password'  => Hash::make('fajar'),
                'dept_code' => 3300,
                'role'     => 'TECHNICIAN'
            ],
        ]);
    }
}
