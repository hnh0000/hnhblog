<?php

namespace App\Http\Controllers\Oauth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function qq()
    {
        require_once (app_path('Plugs/Class/Oauth/Qq/qqConnectAPI.php'));
        $qc = new \QC();
        $qc->qq_login();
    }

}
