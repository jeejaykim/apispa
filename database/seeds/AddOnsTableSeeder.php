<?php

use Illuminate\Database\Seeder;

class AddOnsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('addons')->insert([
            [
                'option' => 'Oil',
                'price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'option' => 'Dry',
                'price' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'option' => 'Coconut Oil',
                'price' => '50',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'option' => 'Stone',
                'price' => '100',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'option' => 'Mask Pack',
                'price' => '100',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
    