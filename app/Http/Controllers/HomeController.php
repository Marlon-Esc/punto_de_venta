<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Sale;
use App\Product;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes= Client::all();
        $ventas=Sale::all();
        $productos= Product::all();
        $ganacias= DB::table('sales')->sum('total');
        return view('home',compact('clientes','ventas','productos','ganacias'));
    }
}
