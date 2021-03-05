<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
        	[
        		'category_id' => 1,
        		'name' => 'Half Body Massage',
				'minutes' => 45,
				'price' => 400,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	],
        	[
        		'category_id' => 1,
        		'name' => 'Whole Body Massage',
				'minutes' => 90,
				'price' => 600,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	],
        	[
        		'category_id' => 1,
        		'name' => 'Full Time',
				'minutes' => 90,
				'price' => 500,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	],
        	[
        		'category_id' => 1,
        		'name' => 'Happy Ending',
				'minutes' => 90,
				'price' => 450,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	],
        	[
        		'category_id' => 2,
        		'name' => 'Strawberry',
				'minutes' => 90,
				'price' => 1000,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	],
        	[
        		'category_id' => 2,
        		'name' => 'Cucumber',
				'minutes' => 90,
				'price' => 2000,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	],
        	[
        		'category_id' => 2,
        		'name' => 'Tomato',
				'minutes' => 90,
				'price' => 0,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	],
        	[
        		'category_id' => 3,
        		'name' => 'Facial Cleaning + Facial Massage',
				'minutes' => 90,
				'price' => 500,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	],
        	[
        		'category_id' => 3,
        		'name' => 'Facial Cleaning + Facial Massage + Head Massage',
				'minutes' => 90,
				'price' => 600,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	],
        	[
        		'category_id' => 3,
        		'name' => 'Facial Cleaning + Facial Massage + Body Massage',
				'minutes' => 90,
				'price' => 700,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
			],
			[
        		'category_id' => 4,
        		'name' => 'API Signature Massage',
				'minutes' => 90,
				'price' => 700,
				'description' => 'Combination of Swedish and Shiatsu',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
			],
			[
        		'category_id' => 4,
        		'name' => 'Traditional Hilot Massage',
				'minutes' => 90,
				'price' => 700,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
			],
			[
        		'category_id' => 4,
        		'name' => 'Harmony Massage',
				'minutes' => 90,
				'price' => 700,
        		'description' => 'Palm Pressure',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
			],
			[
        		'category_id' => 4,
        		'name' => 'Stone Massage',
				'minutes' => 90,
				'price' => 700,
        		'description' => 'Hot Stone Massage with Oil',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
			],
			[
        		'category_id' => 5,
        		'name' => 'Head Massage',
				'minutes' => 30,
				'price' => 250,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
			],
			[
        		'category_id' => 5,
        		'name' => 'Back Massage',
				'minutes' => 30,
				'price' => 250,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
			],
			[
        		'category_id' => 5,
        		'name' => 'Massage',
				'minutes' => 30,
				'price' => 250,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
			],
			[
        		'category_id' => 5,
        		'name' => 'Foot Massage',
				'minutes' => 30,
				'price' => 250,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
			],
			[
        		'category_id' => 5,
        		'name' => 'Hand Massage',
				'minutes' => 30,
				'price' => 250,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
			],
			[
        		'category_id' => 5,
        		'name' => 'Foot and Hand Massage Refelexology',
				'minutes' => 30,
				'price' => 250,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
			],
			[
        		'category_id' => 5,
        		'name' => 'Reflexology',
				'minutes' => 30,
				'price' => 300,
				'description' => null,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
			],
        ]);
    }
}