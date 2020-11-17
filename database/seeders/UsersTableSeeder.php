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
                'email'     => 'user',
                'password'  => Hash::make('user'),
                'role'     => 'USER'
            ],
            [
                'name'      => 'Tec',
                'email'     => 'tec',
                'password'  => Hash::make('tec'),
                'role'     => 'TECHNICIAN'
            ],
            [
                'name'      => 'Man',
                'email'     => 'man',
                'password'  => Hash::make('man'),
                'role'     => 'MANAGER'
            ]
        ]);
    }
}
