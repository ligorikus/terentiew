<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \App\Model\User $admin */
        $admin = \App\Model\User::create([
            'email' => 'admin@jater.ru',
            'name' => 'admin',
            'password' =>  \Illuminate\Support\Facades\Hash::make('secret')
        ]);

        $role_admin = \App\Model\Role::where('name', 'admin')->first();
        $admin->roles()->attach($role_admin);
    }
}
