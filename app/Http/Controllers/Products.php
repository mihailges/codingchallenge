<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Product\ProductRepository;


class Products extends BaseController
{
	protected $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
    	$this->productRepo = $productRepo;
    }

    /** [Display the products] */
    public function displayProducts()
    {
    	$products = $this->productRepo->getProducts();

    	return view('products', compact('products'));
    }
}
