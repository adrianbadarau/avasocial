<?php

namespace App\Http\Controllers;

use App\Avangate\ApiSdk;
use App\Product;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected  $avangateSDK;

    public function __construct(ApiSdk $apiSdk)
    {
        $this->middleware('auth');

        $this->avangateSDK = $apiSdk;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('user_id', Auth::user()->id)->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return redirect()->back();
        }

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

        return redirect()->to('products')->with('status', "Products have been refreshed.");
    }
}
