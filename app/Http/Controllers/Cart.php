<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use App\Helpers\Calculators\CartCalculator\TotalItemsCartCalculator;
use App\Helpers\Calculators\CartCalculator\TotalPriceCartCalculator;


class Cart extends BaseController
{
	protected $cartRepo;


    public function __construct(CartRepository $cartRepo)
    {
    	$this->cartRepo = $cartRepo;
    }

    /** [Display the shopping cart] */
    public function index()
    {
    	$cart = $this->cartRepo->getCart();
    	$totalProducts = $this->cartRepo->calculate(new TotalItemsCartCalculator());
    	$totalPrice = $this->cartRepo->calculate(new TotalPriceCartCalculator());

    	return view('cart', compact('cart', 'totalPrice', 'totalProducts'));
    }

    /** [Add product to cart] */
    public function addProduct(Request $request)
    {
    	$this->cartRepo->addProduct($request);

    	return redirect()->back()->with('message','The product was succesfully added in your shopping cart.'); 
    }

    /** [Destroy cart] */
    public function emptyCart()
    {
   		$this->cartRepo->emptyCart();

   		return redirect()->back()->with('message','Your cart data was destroyed.'); 
    }

}
