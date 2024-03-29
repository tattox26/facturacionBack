<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Invoices,Items};
class FacturaController extends Controller
{
    /* Se muestra toda la factuacion de los usuarios e items */
    public function index()
    {
        $invoices['invoices'] = Invoices::with('user')->get();
        foreach($invoices['invoices'] as $key  => $invoice ){
            $invoices['items'][$key] = Items::where('user_id',$invoice['user_id'])->get();
        }
        return $invoices;
    }

    public function getInvoice($id)
    {
        $invoices['invoices'] = Invoices::with('user')->whereId($id)->first();
        $invoices['items'] = Items::where('user_id',$invoices['invoices']['user_id'])->get();
        return $invoices;
    }
    /* Se guarda la factura con respecto a los items que tiene el suaurio*/ 
    public function store(Request $request)
    {
        $existEmisor  = User::find($request->emisor);
        if(!empty($existEmisor) ){
            try{
                $data = $request->all();
                $items = Items::where('user_id',$request->receptor)->get();
                $valor_suma=0;
                foreach($items as $item){
                    $valor_suma += $item->valor ;
                }
                $data['valor'] =  $valor_suma;
                $numero_factura = rand(1,100000000);
                $data['iva'] = 19;
                $data['total'] =  $valor_suma*19;
                $data['numero_factura'] = $numero_factura;
                Invoices::create($data);
                return response()->json(['message' =>"Creado con exito"]);
            } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 405);
            }
        }
        else{
            return response()->json(['message' =>"No existe el usuario"]);
        }

    }


}

