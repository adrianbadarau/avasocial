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
                'domain'=>'bitly.com',
                'longUrl'=>$link,
            ]
        ]);
        if ($resp->getStatusCode() === 200){
            return json_decode($resp->getBody())->data->url;
        }else{
            return $resp->getReasonPhrase();
        }
    }

    public function getLinkClicks($link)
    {
        $resp = $this->client->get('v3/link/clicks',[
            'query'=>[
                'access_token'=>$this->token,
                'link'=>$link,
            ]
        ]);

        if ($resp->getStatusCode() === 200){
            return json_decode($resp->getBody())->data->link_clicks;
        }else{
            return $resp->getReasonPhrase();
        }
    }
}