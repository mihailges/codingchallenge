<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\Cart;
use \Mockery as m;


class CartTest extends TestCase
{
	protected $cartRepositoryMock;
	protected $requestMock;
    protected $cart;

    public function setUp()
    {
    	parent::setup();
    	$this->cartRepositoryMock = m::mock('App\Repositories\Cart\CartRepository');
    	$this->request = m::mock('Illuminate\Http\Request');
    	// inject the mocked version of the repository
    	$this->cart = new Cart($this->cartRepositoryMock);
    	
    }
  	
  	public function tearDown()
  	{
    	m::close();
    	parent::tearDown();
  	}

    public function test_index_http_request()
    {
        $res = $this->call('GET', '/cart');
    	$res->assertStatus(200);
    	$res->assertViewHas('cart');
    	$res->assertViewHas('totalPrice');
    	$res->assertViewHas('totalProducts');
    }

    public function test_index()
    {
    	$this->cartRepositoryMock->shouldReceive('getCart')->once()->andReturn([]);
    	$this->cartRepositoryMock->shouldReceive('calculate')->twice()->andReturn(10);
    	
    	$this->cart->index();
    }

    public function test_add_product_http_request()
    {
        $res = $this->call('POST', '/cart/add-product');
        $res->assertStatus(302);
        $this->assertTrue(\Session::has('cart'));
    }

    public function test_add_product()
    {
    	$this->cartRepositoryMock->shouldReceive('addProduct')->once()->with($this->request);
    	$this->cart->addProduct($this->request);
    }

    public function test_empty_cart_http_request()
    {
        $res = $this->call('GET', '/cart/empty-cart');
        $res->assertStatus(302);
        $this->assertTrue(!\Session::has('cart'));
    }

    public function test_empty_cart()
    {
    	$this->cartRepositoryMock->shouldReceive('emptyCart')->once();

    	$this->cart->emptyCart($this->request);
    }
}
