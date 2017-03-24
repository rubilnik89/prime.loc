<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AccountTypesTableSeeder::class);
        $this->call(AccountsTableSeeder::class);
        $this->call(TarifsTableSeeder::class);
    }
}
