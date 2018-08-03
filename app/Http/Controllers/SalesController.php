<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Response;
use Illuminate\Http\Request;
use App\SaleDetail;
use App\Sale;
use App\Product;
use Carbon\Carbon;
use App\Client;

class SalesController extends Controller
{
    public function index()
    {
    	$date= Carbon::now();
    	$date = $date->format('d/m/Y');
    	$sale = Sale::all();
    	$clientes = Client::all();
    	$productos = Product::all();
        return view('users.ventas.tbl_venta',compact('sale','productos','date','clientes'));
    }
    public function carrito(Request $request)
    {
    	$producto= Product::findOrFail($request->id);
    	$cantidad=  $request->cantidad;

    	$neto= $producto->precio_vent * $request->cantidad; //subtotal por producto
    	$sub_total= $neto + session('subtotal'); //subtotal de todos los productos del carrito
    	session(['subtotal' => $sub_total]);

    	$iva= $sub_total * 0.16; //iva por todos los productos elegidos
    	session(['iva' => $iva]);

    	$total = $iva + $sub_total;//Total de todos los productos

    	session(['total' => $total]); //guarda el total en la sesion


    	$request->session()->push('productos.total_x_producto', $neto);
    	$request->session()->push('productos.cantidad', $cantidad);
    	$request->session()->push('productos.idproduc', $request->id);
    	$request->session()->push('productos.cantPro', $producto->cantidad);
    
    	return compact('total','sub_total','iva','neto','producto','cantidad'); 
    }
    
    
    public function puchar(Request $request)
    {  
    	$venta= new Sale;
    	$venta->user_id = Auth::user()->id;
    	$venta->client_id = ($request->cliente_id == 0) ? null : $request->cliente_id ;
    	$venta->subtotal = session('subtotal');
    	$venta->IVA =  session('iva');
    	$venta->total = session('total');
    	$venta->save();
    	
    	$producto= session('productos');
    	for ($i=0; $i < count(session('productos.idproduc')) ; $i++) { 
    		$venta_dia = new SaleDetail;
	    	$venta_dia->sales_id= $request->sale_number;
	    	//$venta_dia->user_id=  Auth::user()->id;
	    	//$venta_dia->cliente_id= $request->cliente_id;
	    	$venta_dia->product_id = $producto['idproduc'][$i];
	    	$venta_dia->cantidad = $producto['cantidad'][$i];
	    	$venta_dia->Total= $producto['total_x_producto'][$i];
	    	$venta_dia->created_at = Carbon::now();
	    	$venta_dia->save();

	    	$produc_stock= $producto['cantPro'][$i] - $producto['cantidad'][$i];
	    	Product::findOrFail($producto['idproduc'][$i])->update(['cantidad' => $produc_stock]);

    	}
    	//return count(session('productos.idproduc'));
    	$success = 'La venta se ha generado exitosamente';
	    return back()->with(compact('success'));

		
    }
}
