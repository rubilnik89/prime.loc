<?php

use Illuminate\Database\Seeder;
use App\models\User;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'name' => 'Valery',
            'surname' => 'Ivanov',
            'phone' => '05011111111',
            'country' => 'UA',
            'is_admin' => false,
            'activated' => true,
            'password' => bcrypt('111111'),
            'email' => 'webf4f@gmail.com',
        ]);
        User::create([
            'name' => 'superadmin',
            'surname' => 'superadmin',
            'phone' => '0555034200',
            'country' => 'UA',
            'is_admin' => true,
            'activated' => true,
            'password' => '$2y$10$b2ojmy4SCcBC4CExlMxYy.hozfIjtL8dJ1wDQK/0NPCsFRwKzWBPG',
            'email' => 'superadmin@example.com',
        ]);
        User::create([
            'name' => 'Roman',
            'surname' => 'Zherebko',
            'phone' => '0996476701',
            'country' => 'AL',
            'is_admin' => true,
            'activated' => true,
            'password' => '$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email' => 'rubilnik89@mail.ru',
        ]);
        User::create([
            'name' => 'Galina',
            'surname' => 'Kulik',
            'phone' => '0557841202',
            'country' => 'AL',
            'is_admin' => false,
            'activated' => true,
            'password' => '$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email' => 'dgfgdfgrgr@fdef.rgf',
        ]);
        User::create([
            'name' => 'Valina',
            'surname' => 'Kulik',
            'phone' => '0557834203',
            'country' => 'AL',
            'is_admin' => false,
            'activated' => true,
            'password' => '$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email' => 'dgftrdfgrgr@fdef.rgf',
        ]);
        User::create([
            'name' => 'Valfna',
            'surname' => 'Kulik',
            'phone' => '0577834204',
            'country' => 'AL',
            'is_admin' => false,
            'activated' => true,
            'password' => '$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email' => 'dgftrdfgrkj@fdef.rgf',
        ]);
        User::create([
            'name' => 'Varena',
            'surname' => 'Kulik',
            'phone' => '0557694205',
            'country' => 'AL',
            'is_admin' => false,
            'activated' => true,
            'password' => '$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email' => 'dgftrvcgrgr@fdef.rgf',
        ]);
        User::create([
            'name' => 'Valona',
            'surname' => 'Kulik',
            'phone' => '0557034206',
            'country' => 'AL',
            'is_admin' => false,
            'activated' => true,
            'password' => '$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email' => 'dbnrdfgrgr@fdef.rgf',
        ]);
        User::create([
            'name' => 'Valmoa',
            'surname' => 'Kulik',
            'phone' => '0555034207',
            'country' => 'AL',
            'is_admin' => false,
            'activated' => true,
            'password' => '$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email' => 'dgftrdfkklgr@fdef.rgf',
        ]);
        User::create([
            'name' => 'Vcfina',
            'surname' => 'Kulik',
            'phone' => '0557994208',
            'country' => 'AL',
            'is_admin' => false,
            'activated' => true,
            'password' => '$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email' => 'dgftrporgr@fdef.rgf',
        ]);

    }
}
