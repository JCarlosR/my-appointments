<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class UserController extends Controller
{
    public function show()
    {
    	return Auth::guard('api')->user();
    }
}
