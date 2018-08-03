<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\SaleDetail;
use DB;
class IngresosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firts= DB::table('sales')
                ->join('clients', 'sales.client_id', '=', 'clients.id')
                ->select( 'clients.nombre_complet','clients.id')
                ->get();
        $ventas= DB::table('sales')
            ->join('users', 'sales.user_id', '=', 'users.id')
            ->select( 'sales.*','users.name')
            ->get();
        //$detalleVent= SaleDetail::all();
        foreach ($ventas as $valor) {
            foreach ($firts as $value) {
                if ($valor->client_id == $value->id) {
                    $valor->client_id = $value->nombre_complet;
                    break;
                } else{
                    $valor->client_id = 'Sin cliente';
                    break;
                }
            }
            //return $valor->nombre_complet;
        }
        return view('users.ingresos.tbl_ventas',compact('ventas','detalleVent','firts'));
        //return $ventas;
    }

    public function show(Request $request)
    {
        $saledetail=  DB::table('saledetails')
            ->join('sales', 'saledetails.sales_id', '=', 'sales.id')
            ->join('products', 'saledetails.product_id', '=', 'products.id')
            ->where('sales_id', $request->id)
            ->select('saledetails.*','products.descripcion','sales.total')
            ->get();
        return response()->json($saledetail);
    }

  
}
