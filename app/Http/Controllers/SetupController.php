<?php

namespace App\Http\Controllers;

use App\Avangate\ApiSdk;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SetupController extends Controller
{
    private $avangateSDK;
    /**
     * SetupController constructor.
     */
    public function __construct()
    {
        $this->avangateSDK = new ApiSdk();
    }

    public function seedProducts()
    {
        
    }
}
