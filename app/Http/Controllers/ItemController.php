<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\{Invoices,Items};
class ItemController extends Controller
{
    /* Mostrar todos los items y el suaurio vinculado */
    public function index()
    {
        $usuarios = Items::with('user')->get();
        return $usuarios;
    }
    /* Aqui se guarda los datos */
    public function store(Request $request)
    {
        /* Verifica si existe */
        $exist= User::find($request->user_id);
        if(!empty($exist)){
            try{
                $data = $request->all();
                 /* Se multiplica la cantida dpor el valor */
                $data['total'] = $request->cantidad*$request->valor;
                Items::create($data);
                return response()->json(['message' =>"Creado con exito"],200);
            } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 405);
            }
        }else{
            return response()->json(['message' =>"No existe el usuario"]);
        }

    }

    /* REalizr la modificaion */ 
    public function update(Request $request, $id)
    {
        try{
             /* Se verifica si existe el item */ 
            $exist= Items::find($id);
            if(!empty($exist)){
                /* Se multiplica la cantida dpor el valor */
                $request->total = $request->cantidad * $request->valor;
                Items::where('id',$id)->update([ 'nombre' => $request->nombre, 'descripcion'=>$request->descripcion,'cantidad'=>$request->cantidad ,'valor'=>$request->valor ,'total'=> $request->total] );            
                return response()->json(['message' =>"Modificado con exito"],200);
            }else{
                return response()->json(['message' =>"No existe el item"], 404);
            }
        } catch (\Exception $e) {
           return response()->json(['message' => $e->getMessage()], 405);
        }
    }

    /* Se elimina el item */
    public function destroy($id)
    {
         try{
            $exist= Items::find($id);
            if(!empty($exist)){
                Items::where('id',$id)->delete();            
                return response()->json(['message' =>"Eliminado con exito"],200);
            }else{
                return response()->json(['message' =>"No existe el item"], 404);
            }
        } catch (\Exception $e) {
           return response()->json(['message' => $e->getMessage()], 405);
        }
    }
    
    /* Se veficia el item solo uno con su respectivo uuario */
    public function get($id)
    {
        $item = Items::with('user')->whereId($id)->get();
        return response()->json($item[0], 200);
    }
}