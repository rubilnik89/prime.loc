<?php

use Illuminate\Database\Seeder;
use App\Account;
use Illuminate\Support\Facades\DB;

class AccountsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('accounts')->delete();
        Account::create([
            'number' => '88880',
            'user_id' => 1,
            'type_id' => 1,
            'balance' => '0.0000',
        ]);
        Account::create([
            'number' => '88881',
            'user_id' => 2,
            'type_id' => 1,
            'balance' => '0.0000',
        ]);
        Account::create([
            'number' => '88882',
            'user_id' => 3,
            'type_id' => 1,
            'balance' => '0.0000',
        ]);
        Account::create([
            'number' => '88883',
            'user_id' => 4,
            'type_id' => 1,
            'balance' => '0.0000',
        ]);
        Account::create([
            'number' => '88884',
            'user_id' => 5,
            'type_id' => 1,
            'balance' => '0.0000',
        ]);
        Account::create([
            'number' => '88885',
            'user_id' => 6,
            'type_id' => 1,
            'balance' => '0.0000',
        ]);
        Account::create([
            'number' => '88886',
            'user_id' => 7,
            'type_id' => 1,
            'balance' => '0.0000',
        ]);
        Account::create([
            'number' => '88887',
            'user_id' => 8,
            'type_id' => 1,
            'balance' => '0.0000',
        ]);
        Account::create([
            'number' => '2489657',
            'balance' => '777780.46',
            'user_id' => 1,
            'type_id' => 2,
        ]);
        Account::create([
            'number' => '2547856',
            'balance' => '812000.436',
            'user_id' => 1,
            'type_id' => 2,
        ]);
        Account::create([
            'number' => '2569874',
            'balance' => '333380.43',
            'user_id' => 2,
            'type_id' => 2,
        ]);
    }
}