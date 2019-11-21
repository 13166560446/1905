<?php

namespace App\Http\Controllers\Wuliu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin;
class LoginController extends Controller
{
   public function login(){
        return view('wuliu.login');
   }
    
}
