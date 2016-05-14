<?php
/**
 * Created by PhpStorm.
 * User: adrianbadarau
 * Date: 14/05/16
 * Time: 08:55
 */

namespace App\Avangate;


class ApiSdk
{
    /**
     * ApiSdk constructor.
     */
    public function __construct()
    {
        $date = gmdate('Y-m-d H:i:s');
        $code = \Auth::user()->code;
        $key = \Auth::user()->key;
        $hash = hash_hmac('md5', strlen($code) . $code . strlen($date) . $date, $key);
        $headers = [
            'X-Avangate-Authentication' => 'code="' . $code . '" date="' . $date . '" hash="' . $hash . '"',
            'Accept' => "application/json"
        ];
    }
}