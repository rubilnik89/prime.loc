<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountTypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('account_types')->delete();
        DB::table('account_types')->insert(array('name' => 'Лицевой'));
        DB::table('account_types')->insert(array('name' => 'Инвесторский'));
    }
}