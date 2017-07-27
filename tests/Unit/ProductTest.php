<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\Products;
use \Mockery as m;

class ProductTest extends TestCase
{
    private $productRepository;
    private $products;
    
    public function setUp()
    {
    	parent::setup();
    	$this->productRepository = m::mock('App\Repositories\Product\ProductRepository');
    	// inject the mocked version of the repository
    	$this->products = new Products($this->productRepository);
    }
  	
  	public function tearDown()
  	{
    	m::close();
    	parent::tearDown();
  	}

    public function test_products_http_request()
    {
        $res = $this->call('GET', '/products');
    	$res->assertStatus(200);
    	$res->assertViewHas('products');
    }

    public function test_display_products()
    {
    	$this->productRepository->shouldReceive('getProducts')->once()->andReturn([]);
    	$this->products->displayProducts();
    }
}
