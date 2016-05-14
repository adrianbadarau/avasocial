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
    protected $headers;

    /**
     * ApiSdk constructor.
     */
    public function __construct()
    {

        $this->client = new Client([
            'base_url' => 'https://api.avangate.com/3.0/',
            'defaults' => [
                'headers' => $this->generateHeaders()
            ]
        ]);
    }

    private function generateHeaders($vKey=null,$vCode=null)
    {
        $date = gmdate('Y-m-d H:i:s');
        $code = \Auth::user()->code;
        if($vCode !== null){
            $code = $vCode;
        }
        $key = \Auth::user()->key;
        if($vKey !== null){
            $key = $vKey;
        }
        $hash = hash_hmac('md5', strlen($code) . $code . strlen($date) . $date, $key);
        return [
            'X-Avangate-Authentication' => ' code="' . $code . '" date="' . $date . '" hash="' . $hash . '"',
            'Accept' => "application/json"
        ];

    }

    public function getAllProducts()
    {
        $response = $this->client->get('products/', [
            'query' => [
                'Enabled' => 'true',
                'Limit' => '9999',
            ]
        ]);

        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody());
        } else {
            throw new \Exception('API http error ' . $response->getStatusCode() . ' with ' . $response->getReasonPhrase(), 500);
        }
    }

    public function isGoodAuthData($key, $code)
    {
        $response = $this->client->get('products/', [
            'headers'=>$this->generateHeaders($key,$code),
            'query' => [
                'Enabled' => 'true',
                'Limit' => '1',
            ]
        ]);

        if($response->getStatusCode() === 200){
            return true;
        }

        return false;
    }


}