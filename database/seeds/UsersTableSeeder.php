<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'name' => 'superadmin',
            'surname' => 'superadmin',
            'phone' => '0555034252',
            'country' => 'UA',
            'is_admin' => true,
            'activated' => true,
            'password' => '$2y$10$b2ojmy4SCcBC4CExlMxYy.hozfIjtL8dJ1wDQK/0NPCsFRwKzWBPG',
            'email' => 'superadmin@example.com',
        ]);
        User::create([
            'name' => 'Roman',
            'surname' => 'Zherebko',
            'phone' => '0996476763',
            'country' => 'AL',
            'is_admin' => true,
            'activated' => true,
            'password' => '$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email' => 'rubilnik89@mail.ru',
        ]);
        User::create([
            'name' => 'Galina',
            'surname' => 'Kulik',
            'phone' => '0557841252',
            'country' => 'AL',
            'is_admin' => false,
            'activated' => true,
            'password' => '$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email' => 'dgfgdfgrgr@fdef.rgf',
        ]);
        User::create([
            'name' => 'Valina',
            'surname' => 'Kulik',
            'phone' => '0557834252',
            'country' => 'AL',
            'is_admin' => false,
            'activated' => true,
            'password' => '$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email' => 'dgftrdfgrgr@fdef.rgf',
        ]);
        User::create([
            'name' => 'Valfna',
            'surname' => 'Kulik',
            'phone' => '0577834252',
            'country' => 'AL',
            'is_admin' => false,
            'activated' => true,
            'password' => '$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email' => 'dgftrdfgrkj@fdef.rgf',
        ]);
        User::create([
            'name' => 'Varena',
            'surname' => 'Kulik',
            'phone' => '0557694252',
            'country' => 'AL',
            'is_admin' => false,
            'activated' => true,
            'password' => '$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email' => 'dgftrvcgrgr@fdef.rgf',
        ]);
        User::create([
            'name' => 'Valona',
            'surname' => 'Kulik',
            'phone' => '0557034252',
            'country' => 'AL',
            'is_admin' => false,
            'activated' => true,
            'password' => '$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email' => 'dbnrdfgrgr@fdef.rgf',
        ]);
        User::create([
            'name' => 'Valmoa',
            'surname' => 'Kulik',
            'phone' => '0555034252',
            'country' => 'AL',
            'is_admin' => false,
            'activated' => true,
            'password' => '$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email' => 'dgftrdfkklgr@fdef.rgf',
        ]);
        User::create([
            'name' => 'Vcfina',
            'surname' => 'Kulik',
            'phone' => '0557994252',
            'country' => 'AL',
            'is_admin' => false,
            'activated' => true,
            'password' => '$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email' => 'dgftrporgr@fdef.rgf',
        ]);

    }
}
