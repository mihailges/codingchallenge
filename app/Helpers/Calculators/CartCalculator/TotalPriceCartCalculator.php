<?php 

namespace App\Helpers\Calculators\CartCalculator;

use App\Helpers\Calculators\CartCalculator\CartCalculatorInterface;
use Session;


class TotalPriceCartCalculator implements CartCalculatorInterface 
{

	public function calculate()
	{
		$totalPrice = 0;

		foreach(Session::get('cart') as $item)
		{
			$totalPrice += $item['qty'] * $item['product_price'];
		}

		return $totalPrice;
	}

}