<?php

namespace App\Http\Controllers;

use App\Bitly\ApiSdk;
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
        $shortlink = $this->bitlySdk->shortenLink($link);
        return response()->json($shortlink, 200);
    }

    public function shortenLink()
    {

    }
}
