<?php

namespace App\Http\Controllers;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Provider;

class providerController extends Controller
{
    public function index()
    {
    	$providers = Provider::all();
        return view('users.provedores.tbl_provider',compact('providers'));
    }
    public function store(Request $request){
     $rules = array(
	     'nombre' => 'required',
        'empresa' => 'required',
        'telefono' => 'required',
        'direccion' => 'required',
    );
	  $validator = Validator::make ( Input::all(), $rules);
	  if ($validator->fails())
	  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

	  else {
	    $provider = new Provider;
	    $provider->nombre_complet = $request->nombre;
	    $provider->empresa = $request->empresa;
	    $provider->telefono = $request->telefono;
	    $provider->direccion =  $request->direccion;
	    $provider->save();
        return response()->json($provider);
    }
   }
    public function update(Request $request){
        $provider = Provider::find ($request->id);
        $provider->nombre_complet = $request->nombre;
        $provider->empresa = $request->empresa;
        $provider->telefono = $request->telefono;
        $provider->direccion =  $request->direccion;
        $provider->save();
        return response()->json($provider);
    }
    public function disabled(Request $request){
         //Provider::findOrFail($request->id)->update(['edo' => 0]);
          $provider = Provider::find($request->id);
          $provider->edo = 0;
          $provider->save();
          $result_success = "La categoria ha sido editada correctamente";
         return $result_success;
    }
 }
