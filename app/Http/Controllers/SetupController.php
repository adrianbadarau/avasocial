<?php

namespace App\Http\Controllers;

use App\Avangate\ApiSdk;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SetupController extends Controller
{
    private $avangateSDK;

    /**
     * SetupController constructor.
     *
     * @param ApiSdk $apiSdk
     */
    public function __construct(ApiSdk $apiSdk)
    {
        $this->avangateSDK = $apiSdk;
    }

    public function seedProducts()
    {
        $products = $this->avangateSDK->getAllProducts();
        foreach ($products as $product){
            if($product->ProductCode){
                Product::create([
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
