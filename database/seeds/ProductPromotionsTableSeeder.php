<?php

use Illuminate\Database\Seeder;


class ProductPromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('product_promotions')->insert(
        		array(
			    	array(
			    		'name' => 'NoPromotion',
			    		'text' => ' ',
			    		'description' => 'The product has no promotion.',
			    		),
			    	array(
			    		'name' => 'BuyOneGetOneFree',
			    		'text' => 'Buy one get one for free!',
			    		'description' => 'If you buy the product, you get one for free.',
			    		),
		    	)
        	);

    }
}
