<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

use DB;

class ProxyController extends Controller
{
    public function index(){

        $re=DB::connection('mysql2')->select("select * from good_proxy");
        $count = count($re);

        return view('proxy/index', ['flights' => $re , 'count' => $count ]);
    }

}