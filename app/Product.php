<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    public $timestamps = false;

    protected $fillable = [
        'product_name', 'product_img', 'user_id'
    ];

}