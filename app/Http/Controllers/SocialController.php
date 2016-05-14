<?php

namespace App\Http\Controllers;

use App\Bitly\ApiSdk;
use App\HelperClasses\FacebookBuilder;
use App\HelperClasses\TwitterBuilder;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SocialController extends Controller
{
    private $bitlySdk;
    private $productsLink;

    /**
     * SocialController constructor.
     */
    public function __construct()
    {
        $this->bitlySdk = new ApiSdk();
        $this->productsLink = 'https://backend.avangate.com/order/product.php?PRODS=';
    }

    public function getIcons(Request $request)
    {
        $ids = $request->get('ids');
        $email = $request->get('email');
        $orderRef = $request->get('orderRef');
        $link = $this->productsLink.$ids.'&CUSTOMERID='.$email;

        $shortlink = $this->bitlySdk->shortenLink('https://ec2-52-16-181-60.eu-west-1.compute.amazonaws.com/products');
        dd($shortlink);
        $buttons = [
            FacebookBuilder::generateShareButton($shortlink),
            TwitterBuilder::generateShareButton($shortlink)
        ];
        return response()->json($buttons, 200);
    }

    public function shortenLink()
    {

    }
}
