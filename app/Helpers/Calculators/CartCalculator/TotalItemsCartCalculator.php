<?php 

namespace App\Helpers\Calculators\CartCalculator;

use App\Helpers\Calculators\CartCalculator\CartCalculatorInterface;
use Session;


class TotalItemsCartCalculator implements CartCalculatorInterface 
{

	public function calculate()
	{
		$totalProducts = 0;

		foreach(Session::get('cart') as $item)
		{
			$totalProducts += $item['qty'];
		}

		return $totalProducts;
	}

}