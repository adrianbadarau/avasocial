<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'vendor_products';
    protected $guarded = ['id'];
}
