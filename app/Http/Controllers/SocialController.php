<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SocialController extends Controller
{
    public function getIcons(Request $request)
    {
        return response()->json($request->all(), 200);
    }
}
