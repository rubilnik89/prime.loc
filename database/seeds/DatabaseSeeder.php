<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\PersonalAccount;

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
    }
}

class AccountTypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('account_types')->delete();
        DB::table('account_types')->insert(array('name' => 'Лицевой'));
        DB::table('account_types')->insert(array('name' => 'Инвесторский'));
    }
}
class AccountsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('account_types')->delete();
        PersonalAccount::create([
            'number'=>'88888',
            'user_id'=>1,
        ]);
        PersonalAccount::create([
            'number'=>'88888',
            'user_id'=>2,
        ]);
        PersonalAccount::create([
            'number'=>'88888',
            'user_id'=>3,
        ]);
        PersonalAccount::create([
            'number'=>'88888',
            'user_id'=>4,
        ]);
        PersonalAccount::create([
            'number'=>'88888',
            'user_id'=>5,
        ]);
        PersonalAccount::create([
            'number'=>'88888',
            'user_id'=>6,
        ]);
        PersonalAccount::create([
            'number'=>'88888',
            'user_id'=>7,
        ]);
        PersonalAccount::create([
            'number'=>'88888',
            'user_id'=>8,
        ]);
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'name'=>'Roman',
            'surname'=>'Zherebko',
            'phone'=>'0996476763',
            'country'=>'UA',
            'is_admin'=>true,
            'activated'=>true,
            'password'=>'$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email'=>'rubilnik89@mail.ru',
        ]);
        User::create([
            'name'=>'Galina',
            'surname'=>'Kulik',
            'phone'=>'0557841252',
            'country'=>'RU',
            'is_admin'=>false,
            'activated'=>true,
            'password'=>'$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email'=>'dgfgdfgrgr@fdef.rgf',
        ]);
        User::create([
            'name'=>'Valina',
            'surname'=>'Kulik',
            'phone'=>'0557834252',
            'country'=>'RU',
            'is_admin'=>false,
            'activated'=>true,
            'password'=>'$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email'=>'dgftrdfgrgr@fdef.rgf',
        ]);
        User::create([
            'name'=>'Valfna',
            'surname'=>'Kulik',
            'phone'=>'0577834252',
            'country'=>'RU',
            'is_admin'=>false,
            'activated'=>true,
            'password'=>'$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email'=>'dgftrdfgrkj@fdef.rgf',
        ]);
        User::create([
            'name'=>'Varena',
            'surname'=>'Kulik',
            'phone'=>'0557694252',
            'country'=>'RU',
            'is_admin'=>false,
            'activated'=>true,
            'password'=>'$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email'=>'dgftrvcgrgr@fdef.rgf',
        ]);
        User::create([
            'name'=>'Valona',
            'surname'=>'Kulik',
            'phone'=>'0557034252',
            'country'=>'RU',
            'is_admin'=>false,
            'activated'=>true,
            'password'=>'$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email'=>'dbnrdfgrgr@fdef.rgf',
        ]);
        User::create([
            'name'=>'Valmoa',
            'surname'=>'Kulik',
            'phone'=>'0555034252',
            'country'=>'RU',
            'is_admin'=>false,
            'activated'=>true,
            'password'=>'$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email'=>'dgftrdfkklgr@fdef.rgf',
        ]);
        User::create([
            'name'=>'Vcfina',
            'surname'=>'Kulik',
            'phone'=>'0557994252',
            'country'=>'RU',
            'is_admin'=>false,
            'activated'=>true,
            'password'=>'$2y$10$jHTmBxMbx4NE6O7MukQkAO2GDLEUgO8cigNq6mf70JzsWv3Wa0iD.',
            'email'=>'dgftrporgr@fdef.rgf',
        ]);

    }
}
class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();
        DB::table('countries')->insert(array('country_id' => 'AU', 'name' => 'Австралия'));
        DB::table('countries')->insert(array('country_id' => 'AT', 'name' => 'Австрия'));
        DB::table('countries')->insert(array('country_id' => 'AZ', 'name' => 'Азербайджан'));
        DB::table('countries')->insert(array('country_id' => 'AX', 'name' => 'Аландские о-ва'));
        DB::table('countries')->insert(array('country_id' => 'AL', 'name' => 'Албания'));
        DB::table('countries')->insert(array('country_id' => 'DZ', 'name' => 'Алжир'));
        DB::table('countries')->insert(array('country_id' => 'AS', 'name' => 'Американское Самоа'));
        DB::table('countries')->insert(array('country_id' => 'AI', 'name' => 'Ангилья'));
        DB::table('countries')->insert(array('country_id' => 'AO', 'name' => 'Ангола'));
        DB::table('countries')->insert(array('country_id' => 'AD', 'name' => 'Андорра'));
        DB::table('countries')->insert(array('country_id' => 'AQ', 'name' => 'Антарктида'));
        DB::table('countries')->insert(array('country_id' => 'AG', 'name' => 'Антигуа и Барбуда'));
        DB::table('countries')->insert(array('country_id' => 'AR', 'name' => 'Аргентина'));
        DB::table('countries')->insert(array('country_id' => 'AM', 'name' => 'Армения'));
        DB::table('countries')->insert(array('country_id' => 'AW', 'name' => 'Аруба'));
        DB::table('countries')->insert(array('country_id' => 'AF', 'name' => 'Афганистан'));
        DB::table('countries')->insert(array('country_id' => 'BS', 'name' => 'Багамские о-ва'));
        DB::table('countries')->insert(array('country_id' => 'BD', 'name' => 'Бангладеш'));
        DB::table('countries')->insert(array('country_id' => 'BB', 'name' => 'Барбадос'));
        DB::table('countries')->insert(array('country_id' => 'BH', 'name' => 'Бахрейн'));
        DB::table('countries')->insert(array('country_id' => 'BY', 'name' => 'Беларусь'));
        DB::table('countries')->insert(array('country_id' => 'BZ', 'name' => 'Белиз'));
        DB::table('countries')->insert(array('country_id' => 'BE', 'name' => 'Бельгия'));
        DB::table('countries')->insert(array('country_id' => 'BJ', 'name' => 'Бенин'));
        DB::table('countries')->insert(array('country_id' => 'BM', 'name' => 'Бермудские о-ва'));
        DB::table('countries')->insert(array('country_id' => 'BG', 'name' => 'Болгария'));
        DB::table('countries')->insert(array('country_id' => 'BO', 'name' => 'Боливия'));
        DB::table('countries')->insert(array('country_id' => 'BA', 'name' => 'Босния и Герцеговина'));
        DB::table('countries')->insert(array('country_id' => 'BW', 'name' => 'Ботсвана'));
        DB::table('countries')->insert(array('country_id' => 'BR', 'name' => 'Бразилия'));
        DB::table('countries')->insert(array('country_id' => 'IO', 'name' => 'Британская территория в Индийском океане'));
        DB::table('countries')->insert(array('country_id' => 'VG', 'name' => 'Британские Виргинские о-ва'));
        DB::table('countries')->insert(array('country_id' => 'BN', 'name' => 'Бруней Даруссалам'));
        DB::table('countries')->insert(array('country_id' => 'BF', 'name' => 'Буркина Фасо'));
        DB::table('countries')->insert(array('country_id' => 'BI', 'name' => 'Бурунди'));
        DB::table('countries')->insert(array('country_id' => 'BT', 'name' => 'Бутан'));
        DB::table('countries')->insert(array('country_id' => 'VU', 'name' => 'Вануату'));
        DB::table('countries')->insert(array('country_id' => 'VA', 'name' => 'Ватикан'));
        DB::table('countries')->insert(array('country_id' => 'GB', 'name' => 'Великобритания'));
        DB::table('countries')->insert(array('country_id' => 'HU', 'name' => 'Венгрия'));
        DB::table('countries')->insert(array('country_id' => 'VE', 'name' => 'Венесуэла'));
        DB::table('countries')->insert(array('country_id' => 'VI', 'name' => 'Виргинские о-ва (США)'));
        DB::table('countries')->insert(array('country_id' => 'UM', 'name' => 'Внешние малые острова (США)'));
        DB::table('countries')->insert(array('country_id' => 'QO', 'name' => 'Внешняя Океания'));
        DB::table('countries')->insert(array('country_id' => 'TL', 'name' => 'Восточный Тимор'));
        DB::table('countries')->insert(array('country_id' => 'VN', 'name' => 'Вьетнам'));
        DB::table('countries')->insert(array('country_id' => 'GA', 'name' => 'Габон'));
        DB::table('countries')->insert(array('country_id' => 'HT', 'name' => 'Гаити'));
        DB::table('countries')->insert(array('country_id' => 'GY', 'name' => 'Гайана'));
        DB::table('countries')->insert(array('country_id' => 'GM', 'name' => 'Гамбия'));
        DB::table('countries')->insert(array('country_id' => 'GH', 'name' => 'Гана'));
        DB::table('countries')->insert(array('country_id' => 'GP', 'name' => 'Гваделупа'));
        DB::table('countries')->insert(array('country_id' => 'GT', 'name' => 'Гватемала'));
        DB::table('countries')->insert(array('country_id' => 'GN', 'name' => 'Гвинея'));
        DB::table('countries')->insert(array('country_id' => 'GW', 'name' => 'Гвинея-Бисау'));
        DB::table('countries')->insert(array('country_id' => 'DE', 'name' => 'Германия'));
        DB::table('countries')->insert(array('country_id' => 'GG', 'name' => 'Гернси'));
        DB::table('countries')->insert(array('country_id' => 'GI', 'name' => 'Гибралтар'));
        DB::table('countries')->insert(array('country_id' => 'HN', 'name' => 'Гондурас'));
        DB::table('countries')->insert(array('country_id' => 'HK', 'name' => 'Гонконг (особый район)'));
        DB::table('countries')->insert(array('country_id' => 'GD', 'name' => 'Гренада'));
        DB::table('countries')->insert(array('country_id' => 'GL', 'name' => 'Гренландия'));
        DB::table('countries')->insert(array('country_id' => 'GR', 'name' => 'Греция'));
        DB::table('countries')->insert(array('country_id' => 'GE', 'name' => 'Грузия'));
        DB::table('countries')->insert(array('country_id' => 'GU', 'name' => 'Гуам'));
        DB::table('countries')->insert(array('country_id' => 'DK', 'name' => 'Дания'));
        DB::table('countries')->insert(array('country_id' => 'CD', 'name' => 'Демократическая Республика Конго'));
        DB::table('countries')->insert(array('country_id' => 'JE', 'name' => 'Джерси'));
        DB::table('countries')->insert(array('country_id' => 'DJ', 'name' => 'Джибути'));
        DB::table('countries')->insert(array('country_id' => 'DG', 'name' => 'Диего-Гарсия'));
        DB::table('countries')->insert(array('country_id' => 'DM', 'name' => 'Доминика'));
        DB::table('countries')->insert(array('country_id' => 'DO', 'name' => 'Доминиканская Республика'));
        DB::table('countries')->insert(array('country_id' => 'EU', 'name' => 'Европейский союз'));
        DB::table('countries')->insert(array('country_id' => 'EG', 'name' => 'Египет'));
        DB::table('countries')->insert(array('country_id' => 'ZM', 'name' => 'Замбия'));
        DB::table('countries')->insert(array('country_id' => 'EH', 'name' => 'Западная Сахара'));
        DB::table('countries')->insert(array('country_id' => 'ZW', 'name' => 'Зимбабве'));
        DB::table('countries')->insert(array('country_id' => 'IL', 'name' => 'Израиль'));
        DB::table('countries')->insert(array('country_id' => 'IN', 'name' => 'Индия'));
        DB::table('countries')->insert(array('country_id' => 'ID', 'name' => 'Индонезия'));
        DB::table('countries')->insert(array('country_id' => 'JO', 'name' => 'Иордания'));
        DB::table('countries')->insert(array('country_id' => 'IQ', 'name' => 'Ирак'));
        DB::table('countries')->insert(array('country_id' => 'IR', 'name' => 'Иран'));
        DB::table('countries')->insert(array('country_id' => 'IE', 'name' => 'Ирландия'));
        DB::table('countries')->insert(array('country_id' => 'IS', 'name' => 'Исландия'));
        DB::table('countries')->insert(array('country_id' => 'ES', 'name' => 'Испания'));
        DB::table('countries')->insert(array('country_id' => 'IT', 'name' => 'Италия'));
        DB::table('countries')->insert(array('country_id' => 'YE', 'name' => 'Йемен'));
        DB::table('countries')->insert(array('country_id' => 'KZ', 'name' => 'Казахстан'));
        DB::table('countries')->insert(array('country_id' => 'KY', 'name' => 'Каймановы острова'));
        DB::table('countries')->insert(array('country_id' => 'KH', 'name' => 'Камбоджа'));
        DB::table('countries')->insert(array('country_id' => 'CM', 'name' => 'Камерун'));
        DB::table('countries')->insert(array('country_id' => 'CA', 'name' => 'Канада'));
        DB::table('countries')->insert(array('country_id' => 'IC', 'name' => 'Канарские о-ва'));
        DB::table('countries')->insert(array('country_id' => 'QA', 'name' => 'Катар'));
        DB::table('countries')->insert(array('country_id' => 'KE', 'name' => 'Кения'));
        DB::table('countries')->insert(array('country_id' => 'CY', 'name' => 'Кипр'));
        DB::table('countries')->insert(array('country_id' => 'KG', 'name' => 'Киргизия'));
        DB::table('countries')->insert(array('country_id' => 'KI', 'name' => 'Кирибати'));
        DB::table('countries')->insert(array('country_id' => 'CN', 'name' => 'Китай'));
        DB::table('countries')->insert(array('country_id' => 'CC', 'name' => 'Кокосовые о-ва'));
        DB::table('countries')->insert(array('country_id' => 'CO', 'name' => 'Колумбия'));
        DB::table('countries')->insert(array('country_id' => 'KM', 'name' => 'Коморские о-ва'));
        DB::table('countries')->insert(array('country_id' => 'CG', 'name' => 'Конго'));
        DB::table('countries')->insert(array('country_id' => 'CR', 'name' => 'Коста-Рика'));
        DB::table('countries')->insert(array('country_id' => 'CI', 'name' => 'Кот д’Ивуар'));
        DB::table('countries')->insert(array('country_id' => 'CU', 'name' => 'Куба'));
        DB::table('countries')->insert(array('country_id' => 'KW', 'name' => 'Кувейт'));
        DB::table('countries')->insert(array('country_id' => 'LA', 'name' => 'Лаос'));
        DB::table('countries')->insert(array('country_id' => 'LV', 'name' => 'Латвия'));
        DB::table('countries')->insert(array('country_id' => 'LS', 'name' => 'Лесото'));
        DB::table('countries')->insert(array('country_id' => 'LR', 'name' => 'Либерия'));
        DB::table('countries')->insert(array('country_id' => 'LB', 'name' => 'Ливан'));
        DB::table('countries')->insert(array('country_id' => 'LY', 'name' => 'Ливия'));
        DB::table('countries')->insert(array('country_id' => 'LT', 'name' => 'Литва'));
        DB::table('countries')->insert(array('country_id' => 'LI', 'name' => 'Лихтенштейн'));
        DB::table('countries')->insert(array('country_id' => 'LU', 'name' => 'Люксембург'));
        DB::table('countries')->insert(array('country_id' => 'MU', 'name' => 'Маврикий'));
        DB::table('countries')->insert(array('country_id' => 'MR', 'name' => 'Мавритания'));
        DB::table('countries')->insert(array('country_id' => 'MG', 'name' => 'Мадагаскар'));
        DB::table('countries')->insert(array('country_id' => 'YT', 'name' => 'Майотта'));
        DB::table('countries')->insert(array('country_id' => 'MO', 'name' => 'Макао (особый район)'));
        DB::table('countries')->insert(array('country_id' => 'MK', 'name' => 'Македония'));
        DB::table('countries')->insert(array('country_id' => 'MW', 'name' => 'Малави'));
        DB::table('countries')->insert(array('country_id' => 'MY', 'name' => 'Малайзия'));
        DB::table('countries')->insert(array('country_id' => 'ML', 'name' => 'Мали'));
        DB::table('countries')->insert(array('country_id' => 'MV', 'name' => 'Мальдивские о-ва'));
        DB::table('countries')->insert(array('country_id' => 'MT', 'name' => 'Мальта'));
        DB::table('countries')->insert(array('country_id' => 'MA', 'name' => 'Марокко'));
        DB::table('countries')->insert(array('country_id' => 'MQ', 'name' => 'Мартиника'));
        DB::table('countries')->insert(array('country_id' => 'MH', 'name' => 'Маршалловы о-ва'));
        DB::table('countries')->insert(array('country_id' => 'MX', 'name' => 'Мексика'));
        DB::table('countries')->insert(array('country_id' => 'MZ', 'name' => 'Мозамбик'));
        DB::table('countries')->insert(array('country_id' => 'MD', 'name' => 'Молдова'));
        DB::table('countries')->insert(array('country_id' => 'MC', 'name' => 'Монако'));
        DB::table('countries')->insert(array('country_id' => 'MN', 'name' => 'Монголия'));
        DB::table('countries')->insert(array('country_id' => 'MS', 'name' => 'Монтсеррат'));
        DB::table('countries')->insert(array('country_id' => 'MM', 'name' => 'Мьянма'));
        DB::table('countries')->insert(array('country_id' => 'NA', 'name' => 'Намибия'));
        DB::table('countries')->insert(array('country_id' => 'NR', 'name' => 'Науру'));
        DB::table('countries')->insert(array('country_id' => 'NP', 'name' => 'Непал'));
        DB::table('countries')->insert(array('country_id' => 'NE', 'name' => 'Нигер'));
        DB::table('countries')->insert(array('country_id' => 'NG', 'name' => 'Нигерия'));
        DB::table('countries')->insert(array('country_id' => 'AN', 'name' => 'Нидерландские Антильские о-ва'));
        DB::table('countries')->insert(array('country_id' => 'NL', 'name' => 'Нидерланды'));
        DB::table('countries')->insert(array('country_id' => 'NI', 'name' => 'Никарагуа'));
        DB::table('countries')->insert(array('country_id' => 'NU', 'name' => 'Ниуе'));
        DB::table('countries')->insert(array('country_id' => 'NZ', 'name' => 'Новая Зеландия'));
        DB::table('countries')->insert(array('country_id' => 'NC', 'name' => 'Новая Каледония'));
        DB::table('countries')->insert(array('country_id' => 'NO', 'name' => 'Норвегия'));
        DB::table('countries')->insert(array('country_id' => 'AE', 'name' => 'ОАЭ'));
        DB::table('countries')->insert(array('country_id' => 'OM', 'name' => 'Оман'));
        DB::table('countries')->insert(array('country_id' => 'BV', 'name' => 'Остров Буве'));
        DB::table('countries')->insert(array('country_id' => 'AC', 'name' => 'Остров Вознесения'));
        DB::table('countries')->insert(array('country_id' => 'CP', 'name' => 'Остров Клиппертон'));
        DB::table('countries')->insert(array('country_id' => 'IM', 'name' => 'Остров Мэн'));
        DB::table('countries')->insert(array('country_id' => 'NF', 'name' => 'Остров Норфолк'));
        DB::table('countries')->insert(array('country_id' => 'CX', 'name' => 'Остров Рождества'));
        DB::table('countries')->insert(array('country_id' => 'BL', 'name' => 'Остров Святого Бартоломея'));
        DB::table('countries')->insert(array('country_id' => 'MF', 'name' => 'Остров Святого Мартина'));
        DB::table('countries')->insert(array('country_id' => 'SH', 'name' => 'Остров Святой Елены'));
        DB::table('countries')->insert(array('country_id' => 'CV', 'name' => 'Острова Зеленого Мыса'));
        DB::table('countries')->insert(array('country_id' => 'CK', 'name' => 'Острова Кука'));
        DB::table('countries')->insert(array('country_id' => 'TC', 'name' => 'Острова Тёркс и Кайкос'));
        DB::table('countries')->insert(array('country_id' => 'HM', 'name' => 'Острова Херд и Макдональд'));
        DB::table('countries')->insert(array('country_id' => 'PK', 'name' => 'Пакистан'));
        DB::table('countries')->insert(array('country_id' => 'PW', 'name' => 'Палау'));
        DB::table('countries')->insert(array('country_id' => 'PS', 'name' => 'Палестинские территории'));
        DB::table('countries')->insert(array('country_id' => 'PA', 'name' => 'Панама'));
        DB::table('countries')->insert(array('country_id' => 'PG', 'name' => 'Папуа – Новая Гвинея'));
        DB::table('countries')->insert(array('country_id' => 'PY', 'name' => 'Парагвай'));
        DB::table('countries')->insert(array('country_id' => 'PE', 'name' => 'Перу'));
        DB::table('countries')->insert(array('country_id' => 'PN', 'name' => 'Питкэрн'));
        DB::table('countries')->insert(array('country_id' => 'PL', 'name' => 'Польша'));
        DB::table('countries')->insert(array('country_id' => 'PT', 'name' => 'Португалия'));
        DB::table('countries')->insert(array('country_id' => 'PR', 'name' => 'Пуэрто-Рико'));
        DB::table('countries')->insert(array('country_id' => 'KR', 'name' => 'Республика Корея'));
        DB::table('countries')->insert(array('country_id' => 'RE', 'name' => 'Реюньон'));
        DB::table('countries')->insert(array('country_id' => 'RU', 'name' => 'Россия'));
        DB::table('countries')->insert(array('country_id' => 'RW', 'name' => 'Руанда'));
        DB::table('countries')->insert(array('country_id' => 'RO', 'name' => 'Румыния'));
        DB::table('countries')->insert(array('country_id' => 'SV', 'name' => 'Сальвадор'));
        DB::table('countries')->insert(array('country_id' => 'WS', 'name' => 'Самоа'));
        DB::table('countries')->insert(array('country_id' => 'SM', 'name' => 'Сан-Марино'));
        DB::table('countries')->insert(array('country_id' => 'ST', 'name' => 'Сан-Томе и Принсипи'));
        DB::table('countries')->insert(array('country_id' => 'SA', 'name' => 'Саудовская Аравия'));
        DB::table('countries')->insert(array('country_id' => 'SZ', 'name' => 'Свазиленд'));
        DB::table('countries')->insert(array('country_id' => 'SJ', 'name' => 'Свальбард и Ян-Майен'));
        DB::table('countries')->insert(array('country_id' => 'KP', 'name' => 'Северная Корея'));
        DB::table('countries')->insert(array('country_id' => 'MP', 'name' => 'Северные Марианские о-ва'));
        DB::table('countries')->insert(array('country_id' => 'SC', 'name' => 'Сейшельские о-ва'));
        DB::table('countries')->insert(array('country_id' => 'PM', 'name' => 'Сен-Пьер и Микелон'));
        DB::table('countries')->insert(array('country_id' => 'SN', 'name' => 'Сенегал'));
        DB::table('countries')->insert(array('country_id' => 'VC', 'name' => 'Сент-Винсент и Гренадины'));
        DB::table('countries')->insert(array('country_id' => 'KN', 'name' => 'Сент-Киттс и Невис'));
        DB::table('countries')->insert(array('country_id' => 'LC', 'name' => 'Сент-Люсия'));
        DB::table('countries')->insert(array('country_id' => 'RS', 'name' => 'Сербия'));
        DB::table('countries')->insert(array('country_id' => 'CS', 'name' => 'Сербия и Черногория'));
        DB::table('countries')->insert(array('country_id' => 'EA', 'name' => 'Сеута и Мелилья'));
        DB::table('countries')->insert(array('country_id' => 'SG', 'name' => 'Сингапур'));
        DB::table('countries')->insert(array('country_id' => 'SY', 'name' => 'Сирия'));
        DB::table('countries')->insert(array('country_id' => 'SK', 'name' => 'Словакия'));
        DB::table('countries')->insert(array('country_id' => 'SI', 'name' => 'Словения'));
        DB::table('countries')->insert(array('country_id' => 'SB', 'name' => 'Соломоновы о-ва'));
        DB::table('countries')->insert(array('country_id' => 'SO', 'name' => 'Сомали'));
        DB::table('countries')->insert(array('country_id' => 'SD', 'name' => 'Судан'));
        DB::table('countries')->insert(array('country_id' => 'SR', 'name' => 'Суринам'));
        DB::table('countries')->insert(array('country_id' => 'US', 'name' => 'США'));
        DB::table('countries')->insert(array('country_id' => 'SL', 'name' => 'Сьерра-Леоне'));
        DB::table('countries')->insert(array('country_id' => 'TJ', 'name' => 'Таджикистан'));
        DB::table('countries')->insert(array('country_id' => 'TH', 'name' => 'Таиланд'));
        DB::table('countries')->insert(array('country_id' => 'TW', 'name' => 'Тайвань'));
        DB::table('countries')->insert(array('country_id' => 'TZ', 'name' => 'Танзания'));
        DB::table('countries')->insert(array('country_id' => 'TG', 'name' => 'Того'));
        DB::table('countries')->insert(array('country_id' => 'TK', 'name' => 'Токелау'));
        DB::table('countries')->insert(array('country_id' => 'TO', 'name' => 'Тонга'));
        DB::table('countries')->insert(array('country_id' => 'TT', 'name' => 'Тринидад и Тобаго'));
        DB::table('countries')->insert(array('country_id' => 'TA', 'name' => 'Тристан-да-Кунья'));
        DB::table('countries')->insert(array('country_id' => 'TV', 'name' => 'Тувалу'));
        DB::table('countries')->insert(array('country_id' => 'TN', 'name' => 'Тунис'));
        DB::table('countries')->insert(array('country_id' => 'TM', 'name' => 'Туркменистан'));
        DB::table('countries')->insert(array('country_id' => 'TR', 'name' => 'Турция'));
        DB::table('countries')->insert(array('country_id' => 'UG', 'name' => 'Уганда'));
        DB::table('countries')->insert(array('country_id' => 'UZ', 'name' => 'Узбекистан'));
        DB::table('countries')->insert(array('country_id' => 'UA', 'name' => 'Украина'));
        DB::table('countries')->insert(array('country_id' => 'WF', 'name' => 'Уоллис и Футуна'));
        DB::table('countries')->insert(array('country_id' => 'UY', 'name' => 'Уругвай'));
        DB::table('countries')->insert(array('country_id' => 'FO', 'name' => 'Фарерские о-ва'));
        DB::table('countries')->insert(array('country_id' => 'FM', 'name' => 'Федеративные Штаты Микронезии'));
        DB::table('countries')->insert(array('country_id' => 'FJ', 'name' => 'Фиджи'));
        DB::table('countries')->insert(array('country_id' => 'PH', 'name' => 'Филиппины'));
        DB::table('countries')->insert(array('country_id' => 'FI', 'name' => 'Финляндия'));
        DB::table('countries')->insert(array('country_id' => 'FK', 'name' => 'Фолклендские о-ва'));
        DB::table('countries')->insert(array('country_id' => 'FR', 'name' => 'Франция'));
        DB::table('countries')->insert(array('country_id' => 'GF', 'name' => 'Французская Гвиана'));
        DB::table('countries')->insert(array('country_id' => 'PF', 'name' => 'Французская Полинезия'));
        DB::table('countries')->insert(array('country_id' => 'TF', 'name' => 'Французские Южные Территории'));
        DB::table('countries')->insert(array('country_id' => 'HR', 'name' => 'Хорватия'));
        DB::table('countries')->insert(array('country_id' => 'CF', 'name' => 'ЦАР'));
        DB::table('countries')->insert(array('country_id' => 'TD', 'name' => 'Чад'));
        DB::table('countries')->insert(array('country_id' => 'ME', 'name' => 'Черногория'));
        DB::table('countries')->insert(array('country_id' => 'CZ', 'name' => 'Чехия'));
        DB::table('countries')->insert(array('country_id' => 'CL', 'name' => 'Чили'));
        DB::table('countries')->insert(array('country_id' => 'CH', 'name' => 'Швейцария'));
        DB::table('countries')->insert(array('country_id' => 'SE', 'name' => 'Швеция'));
        DB::table('countries')->insert(array('country_id' => 'LK', 'name' => 'Шри-Ланка'));
        DB::table('countries')->insert(array('country_id' => 'EC', 'name' => 'Эквадор'));
        DB::table('countries')->insert(array('country_id' => 'GQ', 'name' => 'Экваториальная Гвинея'));
        DB::table('countries')->insert(array('country_id' => 'ER', 'name' => 'Эритрея'));
        DB::table('countries')->insert(array('country_id' => 'EE', 'name' => 'Эстония'));
        DB::table('countries')->insert(array('country_id' => 'ET', 'name' => 'Эфиопия'));
        DB::table('countries')->insert(array('country_id' => 'ZA', 'name' => 'ЮАР'));
        DB::table('countries')->insert(array('country_id' => 'GS', 'name' => 'Южная Джорджия и Южные Сандвичевы Острова'));
        DB::table('countries')->insert(array('country_id' => 'JM', 'name' => 'Ямайка'));
        DB::table('countries')->insert(array('country_id' => 'JP', 'name' => 'Япония'));
    }
}