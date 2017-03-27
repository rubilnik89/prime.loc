<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Tarif;

class TarifsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarifs')->delete();
        Tarif::create([
            'title' => 'Оптимальный',
            'days' => 365,
            'percent' => 10,
            'enabled' => 1,
        ]);
        Tarif::create([
            'title' => 'Выгодный',
            'days' => 180,
            'percent' => 15,
            'enabled' => 1,
        ]);
        Tarif::create([
            'title' => 'Лучший',
            'days' => 254,
            'percent' => 12,
            'enabled' => 0,
        ]);
        Tarif::create([
            'title' => 'ВИП',
            'days' => 365,
            'percent' => 14,
            'enabled' => 1,
        ]);
    }
}
