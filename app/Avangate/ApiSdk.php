<?php
/**
 * Created by PhpStorm.
 * User: adrianbadarau
 * Date: 14/05/16
 * Time: 08:55
 */

namespace App\Avangate;


use GuzzleHttp\Client;

class ApiSdk
{
    protected $client;

    /**
     * ApiSdk constructor.
     */
    public function __construct()
    {
        $date = gmdate('Y-m-d H:i:s');
        $code = \Auth::user()->code;
        $key = \Auth::user()->key;
        $hash = hash_hmac('md5', strlen($code) . $code . strlen($date) . $date, $key);
        $this->client = new Client([
            'base_uri' => 'https://api.avangate.com/3.0/',
            'headers' => [
                'X-Avangate-Authentication' => 'code="' . $code . '" date="' . $date . '" hash="' . $hash . '"',
                'Accept' => "application/json"
            ]
        ]);
    }

    public function getAllProducts()
    {
        $response = $this->client->get('products/', [
            'query' => [
                'Enabled' => 'true',
                'Limit' => '9999',
            ]
        ]);

        if($response->getStatusCode() === 200){
            return json_decode($response->getBody());
        }else{
            throw new \Exception('API http error '.$response->getStatusCode().' with '.$response->getReasonPhrase(),500);
        }
    }


}