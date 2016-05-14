<?php

namespace App\Http\Controllers;

use App\Avangate\ApiSdk;
use App\ProductModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SetupController extends Controller
{
    private $avangateSDK;
    /**
     * SetupController constructor.
     */
    public function __construct()
    {
        $this->avangateSDK = new ApiSdk();
    }

    public function seedProducts()
    {
        $products = $this->avangateSDK->getAllProducts();
        foreach ($products as $product){
            if($product->ProductCode){
                ProductModel::create([
                    'name'=>$product->ProductName,
                    'avangate_id'=>$product->AvangateId,
                    'avangate_product_code'=>$product->ProductCode,
                    'user_id'=>\Auth::user()->id,
                    'data'=>json_encode($product)
                ]);
            }

        }
    }
}
