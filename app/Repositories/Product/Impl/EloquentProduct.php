<?php 

namespace App\Repositories\Product\Impl;

use App\Product; 
use App\Repositories\Product\ProductRepository;
use DB;

class EloquentProduct implements ProductRepository {

	protected $model;

	public function __construct(Product $product)
	{
		$this->model = $product;
	}

	public function getProducts()
	{
		return $this->model
				->select(
						DB::raw(
							'products.id as product_id,
							 products.name as name, 
							 products.price as price, 
							 products.promotion_id as promotion_id,
							 product_promotions.text as promotion_text'
							)
					)
				->join('product_promotions', 'product_promotions.id', '=', 'products.promotion_id')
				->get();
	}

}