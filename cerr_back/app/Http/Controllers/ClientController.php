<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function getAll(Request $request){
        return response()->json([
            'success'=> true,
            'mensaje'=>"Obtengo todos los clientes desde el controller",
            'data'=> DB::table('client')->get()
            ]);
    }

     public function getId(Request $request , $id){
            return response()->json([
                'success'=> true,
                'mensaje'=>"Obtengo el cliente con id $id desde el controller",
                'data'=> DB::table('client')->get()->where('id',$id)
            ]);
        }

    public function crearCliente(Request $request){
        $datos = $request->only(['Nombre','Dni','Email','Razon_Social','Telefono','Direccion','Cod_postal','Localidad','Provincia','Observaciones','Beneficio']);
        $request->validate([
            'Nombre'=>'max:32',
            'Dni'=>'max:9',
            'Email'=>'nullable',
            'Razon_Social'=>'max:64|nullable',
            'Telefono'=>'max:9',
            'Direccion'=>'max:24',
            'Cod_postal' => 'max:5',
            'Localidad' => 'max:24',
            'Provincia' => 'max:24',
            'Observaciones' => 'max:60',
            'Beneficio' => 'nullable'
        ]);
         try{
                    DB::table('client')->insert($datos);
                }catch(\Exception $e){
                    return "error $e";
                }
    }

     public function deleteCliente(Request $request , $id){
            $usuario = DB::table('client')->where('id',$id)->first();
            if($usuario === null){
                return response()->json([
                    'success'=>false,
                    'mensaje'=>"usuario $id no encontrado",
                    'data'=>null,
                ],404);
            }
            DB::table('client')->where('id',$id)->delete();
            return response()->json([
                'success'=>false,
                'mensaje'=>"El usuario $id fue eliminado",
                'data'=> $usuario,
            ]);
        }

        public function editarCliente(Request $request , $id){
                $datos = $request->only(['Nombre','Dni','Email','Razon_Social','Telefono','Direccion','Cod_postal','Localidad','Provincia','Observaciones','Beneficio']);
                $request->validate([
                                'Nombre'=>'max:32',
                                'Dni'=>'max:9',
                                'Email'=>'nullable',
                                'Razon_Social'=>'max:64|nullable',
                                'Telefono'=>'max:9',
                                'Direccion'=>'max:24',
                                'Cod_postal' => 'max:5',
                                'Localidad' => 'max:24',
                                'Provincia' => 'max:24',
                                'Observaciones' => 'max:60',
                                'Beneficio' => 'nullable'
                ]);
                try{
                    DB::table('client')->where('id',$id)->update($datos);
                }catch(\Exception $e){
                    return "error $e";
                }
        }

}
