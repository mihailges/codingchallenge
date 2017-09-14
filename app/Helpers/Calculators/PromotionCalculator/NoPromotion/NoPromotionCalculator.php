<?php 

namespace App\Helpers\Calculators\PromotionCalculator\NoPromotion;

use App\Helpers\Calculators\PromotionCalculator\AbstractPromotionCalculator;
use App\Helpers\Calculators\PromotionCalculator\PromotionCalculatorInterface;


class NoPromotionCalculator extends AbstractPromotionCalculator implements PromotionCalculatorInterface
{
	public function returnPrice()
	{
		return $this->productPrice * $this->productQty;
	}

	public function returnQty()
	{
		return $this->productQty;
	}

}