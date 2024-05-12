<?php

namespace Database\Seeders\user;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'humam',
            'phone' => '+963947938542',
            'email' => 'homamdaas11@gmail.com',
            'verified_account' => 1,
            'password' => Hash::make('!Password1'),

        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'homam',
            'phone' => '+963947938543',
            'email' => 'for2003project@gmail.com',
            'verified_account' => 1,
            'password' => Hash::make('!Password1'),

        ]);

        DB::table('users')->insert([
            'id' => 3,
            'name' => 'humamDaas',
            'phone' => '+963947938541',
            'email' => 'homamdaas2003@gmail.com',
            'verified_account' => 1,
            'password' => Hash::make('!Password1'),

        ]);
    }
}
