<?php

use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Wallet::create(['type' => 'Наличный']);
        \App\Model\Wallet::create(['type' => 'Безналичный']);
        \App\Model\Wallet::create(['type' => 'Перевод']);
    }
}
