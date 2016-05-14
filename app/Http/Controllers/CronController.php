<?php

namespace App\Http\Controllers;

use App\Product;
use App\UserSharedLink;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CronController extends Controller
{
    public function sendCoupons($token, Product $productModel, UserSharedLink $userSharedLink, \App\Bitly\ApiSdk $bitlyApi)
    {
        $products = $productModel->all();
        foreach ($products as $product){
            $userShares = [];
            $allShares = $userSharedLink->getAllSharedByProduct($product->avangate_id);
            foreach ($allShares as $share){
                $linkShares = $bitlyApi->getLinkClicks($share->short_link);
                if(isset($userShares[$share->user_email])){
                    $userShares[$share->user_email] += $linkShares;
                }else{
                    $userShares[$share->user_email] = $linkShares;
                }
            }
            foreach ($userShares as $email=>$nrOfShares){
                if($nrOfShares >= $product->limit){
                    \Mail::send('mails.reword', ['coupon' => $product->coupon], function($mail) use ($email){
                        $mail->from('reward@avasoci.al','AvaSoci.al');
                        $mail->to($email)->subject('You are a winner!');
                    });
                }
            }
        }

    }
}
