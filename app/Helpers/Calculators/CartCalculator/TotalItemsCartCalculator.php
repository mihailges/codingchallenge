<?php 

namespace App\Helpers\Calculators\CartCalculator;

use App\Helpers\Calculators\CartCalculator\CartCalculatorInterface;
use Session;
use App\Factories\PromotionCalculatorFactory\PromotionCalculatorFactory;


class TotalItemsCartCalculator implements CartCalculatorInterface 
{

	public function calculate()
	{
		$totalProducts = 0;

		foreach (Session::get('cart') as $item)
		{
			// Calculate total number of items including a product promotion
			$promotionCalculator = PromotionCalculatorFactory::create($item['product_promotion'], $item['product_price'], $item['qty']);

			$totalProducts += $promotionCalculator->returnQty();
		}

		return $totalProducts;
	}

}