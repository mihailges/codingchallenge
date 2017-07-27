<?php 

namespace App\Repositories\Product\Impl;


use App\Repositories\Product\ProductRepository;


class ConstArrayProduct implements ProductRepository 
{

	const PRODUCTS = array(
						array(
							'id' => 1,
							'name' => "Desk",
							'price' => "300",
							'promotion' => 0

						),
						array(
							'id' => 2,
							'name' => "Chair",
							'price' => "149",
							'promotion' => 1
						),
						array(
							'id' => 3,
							'name' => "Monitor",
							'price' => "259.9",
							'promotion' => 0
						),
						array(
							'id' => 4,
							'name' => "Computer",
							'price' => "850",
							'promotion' => 1
						),
						array(
							'id' => 5,
							'name' => "Mouse",
							'price' => "14.5",
							'promotion' => 0
						)
					);


	public function getProducts()
	{
		return self::PRODUCTS;
	}

}