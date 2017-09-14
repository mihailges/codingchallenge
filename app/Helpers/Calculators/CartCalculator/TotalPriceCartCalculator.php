<?php 

namespace App\Helpers\Calculators\CartCalculator;

use App\Helpers\Calculators\CartCalculator\CartCalculatorInterface;
use Session;
use App\Factories\PromotionCalculatorFactory\PromotionCalculatorFactory;


class TotalPriceCartCalculator implements CartCalculatorInterface 
{

	public function calculate()
	{
		$totalPrice = 0;

		foreach (Session::get('cart') as $item)
		{
			// Calculate total price including a product promotion
			$promotionCalculator = PromotionCalculatorFactory::create($item['product_promotion'], $item['product_price'], $item['qty']);

			$totalPrice += $promotionCalculator->returnPrice();
		}

		return $totalPrice;
	}

}