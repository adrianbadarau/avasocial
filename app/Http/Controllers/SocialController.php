<?php

namespace App\Http\Controllers;

use App\Bitly\ApiSdk;
use App\HelperClasses\FacebookBuilder;
use App\HelperClasses\TwitterBuilder;
use App\UserSharedLink;
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
        $buttons = [
            FacebookBuilder::generateShareButton($shortlink),
            TwitterBuilder::generateShareButton($shortlink)
        ];
        UserSharedLink::create([
            'user_email'=>$email,
            'avangate_order_ref'=>$orderRef,
            'product_ids'=>$ids,
            'short_link'=>$shortlink
        ]);
        return response()->json($buttons, 200);
    }

    public function shortenLink()
    {

    }
}
