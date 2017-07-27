<?php 

namespace App\Repositories\Cart\Impl;


use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Session;
use App\Helpers\Calculators\CartCalculator\CartCalculatorInterface;


class SessionCart implements CartRepository 
{
	/** [Get all prducts from the cart] */
	public function getCart()
	{
		return Session::get('cart');
	}

	/** [Add product to cart] */
	public function addProduct(Request $product)
	{
		if(Session::has('cart'))
		{
			if($this->productExistsInCart(Session::get('cart'), $product))
			{
				return $this->addExistingProduct(Session::get('cart'), $product);
			}
		}
		
		return $this->addNewProduct($product);
	}

	/** [Destroy cart] */
	public function emptyCart()
	{
		Session::flush();
	}

	/** [Calculate total price and total items] */
	public function calculate(CartCalculatorInterface $cartCalculator)
	{
		if(count(Session::get('cart')) > 0)
		{
			return $cartCalculator->calculate();
		}
	}

	/** [Check if product exists in the cart] */
	private function productExistsInCart($cart, $product)
	{
		foreach($cart as $item)
		{
			if($item['product_id'] == $product->product_id)
			{
				return true;
			}
		}

		return false;
	}

	/** [Add already existing product in the cart] */
	private function addExistingProduct($cart, $product)
	{
		foreach($cart as &$item)
		{
			if($item['product_id'] == $product->product_id)
			{
				$item['qty'] = $item['qty'] + $this->handleProductQty($product);	

				break;
			}
		}

		Session::put('cart', $cart);
	}

	/** [Add new product in the cart] */
	private function addNewProduct($product)
	{
		$productQty = $this->handleProductQty($product);
		$data = array(
			'product_id' => $product->product_id,
			'product_name' => $product->product_name,
			'product_price' => $product->product_price,
			'product_promotion' =>  $product->product_promotion,
			'qty' => $productQty
		);

		Session::push('cart', $data);
	}

	/** [Check if product has a promotion and return the quantity] */
	private function handleProductQty($product)
	{
		if($product->product_promotion == 1)
		{
			return $product->product_qty * 2;
		}

		return $product->product_qty;
	}

}