<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Role::create([
            'name' => 'admin'
        ]);

        \App\Model\Role::create([
            'name' => 'user'
        ]);
    }
}
