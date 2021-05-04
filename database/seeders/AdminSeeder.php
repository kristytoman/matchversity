<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
                'name' => 'admin',
                'email' => 'admin@utb.cz',
                'password' => Hash::make(env('ADMIN_PASSWORD'), '')
        ]);
    }
}
