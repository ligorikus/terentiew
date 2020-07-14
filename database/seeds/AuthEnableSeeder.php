<?php

use Illuminate\Database\Seeder;

class AuthEnableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('auth_enable')->insert(['enable' => false]);
    }
}
