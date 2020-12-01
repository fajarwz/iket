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
                'email'     => 'user',
                'password'  => Hash::make('user'),
                'role'     => 'USER'
            ],
            [
                'name'      => 'Tec',
                'username'  => 'tec',
                'email'     => 'tec',
                'password'  => Hash::make('tec'),
                'role'     => 'TECHNICIAN'
            ],
            [
                'name'      => 'Man',
                'username'  => 'man',
                'email'     => 'man',
                'password'  => Hash::make('man'),
                'role'     => 'MANAGER'
            ],
            [
                'name'      => 'Fajar',
                'username'  => 'fajar',
                'email'     => 'fajar',
                'password'  => Hash::make('fajar'),
                'role'     => 'TECHNICIAN'
            ],
        ]);
    }
}
