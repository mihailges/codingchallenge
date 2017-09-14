<?php 

namespace App\Repositories\Product\Impl;


use App\Repositories\Product\ProductRepository;


class ConstArrayProduct implements ProductRepository 
{
	const NO_PROMOTION = 1;
	const BUY_ONE_GET_ONE_FREE = 2;

	const PRODUCTS = array(
						array(
							'id' => 1,
							'name' => "Desk",
							'price' => "300",
							'promotion' => self::NO_PROMOTION

						),
						array(
							'id' => 2,
							'name' => "Chair",
							'price' => "149",
							'promotion' => self::BUY_ONE_GET_ONE_FREE
						),
						array(
							'id' => 3,
							'name' => "Monitor",
							'price' => "259.9",
							'promotion' => self::BUY_ONE_GET_ONE_FREE
						),
						array(
							'id' => 4,
							'name' => "Computer",
							'price' => "850",
							'promotion' => self::BUY_ONE_GET_ONE_FREE
						),
						array(
							'id' => 5,
							'name' => "Mouse",
							'price' => "14.5",
							'promotion' => self::NO_PROMOTION
						)
					);


	public function getProducts()
	{
		return self::PRODUCTS;
	}

}