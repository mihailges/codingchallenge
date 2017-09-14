<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProductPromotions extends Model
{

    protected $table = 'product_promotions';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'text', 'description',
    ];

    const NO_PROMOTION = 1;
    const BUY_ONE_GET_ONE_FREE = 2;

}
