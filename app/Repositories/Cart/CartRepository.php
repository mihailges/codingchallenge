<?php 

namespace App\Repositories\Cart;

use Illuminate\Http\Request;
use App\Helpers\Calculators\CartCalculator\CartCalculatorInterface;


interface CartRepository {

	public function getCart();
	public function addProduct(Request $product);
	public function emptyCart();
	public function calculate(CartCalculatorInterface $calculator);	

}