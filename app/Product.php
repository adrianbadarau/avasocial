<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'vendor_products';
    protected $guarded = ['id'];

    public function getShares()
    {
        $shares = UserSharedLink::where('product_ids','LIKE',"%{$this->avangate_id}")->groupBy('user_email')->get();
    }

    public function countShares()
    {
        return UserSharedLink::where('product_ids','LIKE',"%{$this->avangate_id}")->count();
    }
}
