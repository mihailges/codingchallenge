<?php 

namespace App\Factories\PromotionCalculatorFactory;

use App\Helpers\Calculators\PromotionCalculator\NoPromotion\NoPromotionCalculator;
use App\Helpers\Calculators\PromotionCalculator\BuyOneGetOneFree\BuyOneGetOneFreeCalculator;


class PromotionCalculatorFactory 
{
	public static function create($promotionId, $productPrice, $productQty)
	{
		switch ($promotionId)
		{
			case 1:
				return new NoPromotionCalculator($productPrice, $productQty);
				break;
			case 2:
				return new BuyOneGetOneFreeCalculator($productPrice, $productQty);
				break;
		}
	}
}