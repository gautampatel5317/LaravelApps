<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as Carbon;

class category_seeder extends Seeder {	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
    	DB::table('category')->delete();
    	DB::statement("SET foreign_key_checks=0");
    	$servies = [
    		[
            	'parent_id' => 0,
            	'name' => 'Automotive and Transport',
            	'status' => 1,
            	'created_at' => Carbon::now(),
        	],
        	[
        		'parent_id' => 0,
            	'name' => 'Business and Finance',
            	'status' => 1,
            	'created_at' => Carbon::now(),
        	],
        	[
        		'parent_id' => 0,
            	'name' => 'Chemicals and Materials',
            	'status' => 1,
            	'created_at' => Carbon::now(),
        	],
        	[
        		'parent_id' => 1,
            	'name' => 'Automotive Aftermarket',
            	'status' => 1,
            	'created_at' => Carbon::now(),
        	],
        	[
        		'parent_id' => 1,
            	'name' => 'Automotive Finance',
            	'status' => 1,
            	'created_at' => Carbon::now(),
        	],
        	[
        		'parent_id' => 1,
            	'name' => 'Automotive Leasing and Rental',
            	'status' => 1,
            	'created_at' => Carbon::now(),
        	],
        	[
        		'parent_id' => 2,
            	'name' => 'Commercial Banking',
            	'status' => 1,
            	'created_at' => Carbon::now(),
        	],
        	[
        		'parent_id' => 2,
            	'name' => 'Business',
            	'status' => 1,
            	'created_at' => Carbon::now(),
        	],
        	[
        		'parent_id' => 3,
            	'name' => 'Adhesives and Sealants',
            	'status' => 1,
            	'created_at' => Carbon::now(),
        	],
        	[
        		'parent_id' => 3,
            	'name' => 'Epoxy Adhesives',
            	'status' => 1,
            	'created_at' => Carbon::now(),
        	],
        	[
        		'parent_id' => 3,
            	'name' => 'Construction Adhesives',
            	'status' => 1,
            	'created_at' => Carbon::now(),
        	]
       	];       	
       	$serviesStore = DB::table('category')->insert($servies);
       	 DB::statement("SET foreign_key_checks=1");
    }
}
