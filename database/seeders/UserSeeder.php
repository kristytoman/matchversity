<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => 'k_tomanova',
                'email' => 'k_tomanova@utb.cz',
                'password' => Hash::make('Matchversity 2021'),
                'email_verified_at' => Carbon::now()
            ]);
    }
}
