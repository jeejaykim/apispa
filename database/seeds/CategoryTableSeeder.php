<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Body Massage',
                'description' => 'Lorem ipsum dolor sit amet',
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Organic Facial Care',
                'description' => 'Lorem ipsum dolor sit amet',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Facial Skin Care',
                'description' => 'Lorem ipsum dolor sit amet',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Body Works',
                'description' => 'Lorem ipsum dolor sit amet',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Quick Services',
                'description' => 'Lorem ipsum dolor sit amet',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

