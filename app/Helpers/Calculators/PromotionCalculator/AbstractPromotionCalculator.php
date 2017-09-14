<?php 

namespace App\Helpers\Calculators\PromotionCalculator;


abstract class AbstractPromotionCalculator
{
	protected $productPrice;
	protected $productQty;
	
	public function __construct($productPrice, $productQty)
	{
		$this->productPrice = $productPrice;
		$this->productQty = $productQty;
	}
}