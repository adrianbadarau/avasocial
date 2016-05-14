<?php
/**
 * Created by PhpStorm.
 * User: adrianbadarau
 * Date: 14/05/16
 * Time: 15:09
 */

namespace App\Bitly;


use GuzzleHttp\Client;

class ApiSdk
{

    protected $client;
    protected $token;

    /**
     * ApiSdk constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_url'=>'https://api-ssl.bitly.com',
        ]);
        $this->token = env('BITLY_TOKEN');
    }


    public function shortenLink($link)
    {
        $resp = $this->client->get('v3/shorten',[
            'query'=>[
                'access_token'=>$this->token,
                'longUrl'=>$link,
            ]
        ]);
        if ($resp->getStatusCode() === 200){
            return json_decode($resp->getBody())->data->url;
        }else{
            return $resp->getReasonPhrase();
        }
    }
}