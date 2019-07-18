<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            'firstname' => 'Gagandeep',
            'lastname' => 'Kurl',
            'email' => 'gkurl@hotmail.co.uk',
            'address' => '50 Fowler Street',
            'dateofbirth' => $faker->date('Y-m-d', 'now'),
            'contactnumber' => $faker->phoneNumber,
            'subscription_id' => 1,
            'password' => bcrypt('gagandeep92'),
            'role_id' => 1
        ]);

        foreach(range(1,10) as $index) {

            DB::table('users')->insert([
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'email' => $faker->email    ,
                'address' => $faker->address,
                'dateofbirth' => $faker->date('Y-m-d', 'now'),
                'contactnumber' => $faker->phoneNumber,
                'subscription_id' => $faker->randomElement([1, 2]),
                'password' => bcrypt('secret'),
                'role_id' => 2
            ]);

        }

    }
}
