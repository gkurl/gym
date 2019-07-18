<?php

use Illuminate\Database\Seeder;

class SubscriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscription')->insert([
            'subscription_name' => 'Monthly - £10',
            'price' => 10
        ]);

        DB::table('subscription')->insert([
            'subscription_name' => 'Annual - £120',
            'price' => 120
        ]);
    }
}
