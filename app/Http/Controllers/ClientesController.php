<?php

namespace App\Http\Controllers;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\Client;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
    	$clientes = Client::all();
        return view('users.clients.tbl_clientes',compact('clientes'));
    }
    public function store(Request $request){
     $rules = array(
	     'nombre' => 'required',
        'email' => 'required',
        'telefono' => 'required',
    );
	  $validator = Validator::make ( Input::all(), $rules);
	  if ($validator->fails())
	  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

	  else {
	    $client = new Client;
	    $client->nombre_complet = $request->nombre;
	    $client->email = $request->email;
	    $client->telefono = $request->telefono;
	    $client->save();
        return response()->json($client);
    }
   }
    public function update(Request $request){
        $client = Client::find ($request->id);
        $client->nombre_complet = $request->nombre;
        $client->email = $request->email;
        $client->telefono = $request->telefono;
        $client->save();
        return response()->json($client);
    }
    public function disabled(Request $request){
         //client::findOrFail($request->id)->update(['edo' => 0]);
          $client = Client::find($request->id);
          $client->edo = 0;
          $client->save();
          $result_success = "La cliente ha sido editada correctamente";
         return $result_success;
    }
}
