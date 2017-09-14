<?php

use Illuminate\Database\Seeder;
use App\ProductPromotions;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
        		array(
			    	array(
						'name' => "Desk",
						'price' => "300",
						'promotion_id' => ProductPromotions::NO_PROMOTION

					),
					array(
						'name' => "Chair",
						'price' => "149",
						'promotion_id' => ProductPromotions::BUY_ONE_GET_ONE_FREE
					),
					array(
						'name' => "Monitor",
						'price' => "259.9",
						'promotion_id' => ProductPromotions::BUY_ONE_GET_ONE_FREE
					),
					array(
						'name' => "Computer",
						'price' => "850",
						'promotion_id' => ProductPromotions::BUY_ONE_GET_ONE_FREE
					),
					array(
						'name' => "Mouse",
						'price' => "14.5",
						'promotion_id' => ProductPromotions::NO_PROMOTION
					)
		    	)
        	);
    }
}
