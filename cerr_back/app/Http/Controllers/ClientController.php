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
    /*
    public function getId(Request $request , $id){
        return response()->json([
            'success'=> true,
            'mensaje'=>"Obtengo el cliente con id $id desde el controller",
            'data'=> DB::table('client')->get()->where('id',$id)
        ]);
    }

    public function deleteClient(Request $request , $id){
        $usuario = DB::table('client')->where('id',$id)->first();
        if($usuario === null){
            return response()->json([
                'success'=>false,
                'mensaje'=>"usuario $id no encontrado",
                'data'=>null,
            ],404);
        }
        DB::table('alumno')->where('id',$id)->delete();
        return response()->json([
            'success'=>false,
            'mensaje'=>"El usuario $id fue eliminado",
            'data'=> $usuario,
        ]);
    }

    public function crearAlumno(Request $request){
        $datos = $request->only(['nombre','telefono','edad','password','email','sexo']);
        $request->validate([
            'nombre'=>'max:32',
            'telefono'=>'max:16|nullable',
            'edad'=>'nullable',
            'password'=>'max:64',
            'email'=>'max:255|unique:alumno',
            'sexo'=>'max:6'
        ]);

        try{
            DB::table('alumno')->insert($datos);
        }catch(\Exception $e){
            return "error $e";
        }
    }

    public function editarAlumno(Request $request , $id){
        $datos = $request->only(['nombre','telefono','edad','password','email','sexo']);
        $request->validate([
            'nombre'=>'max:32',
            'telefono'=>'max:16|nullable',
            'edad'=>'nullable',
            'password'=>'max:64',
            'email'=>'max:255|unique:alumno',
            'sexo'=>'max:5'
        ]);
        try{
            DB::table('alumno')->where('id',$id)->update($datos);
        }catch(\Exception $e){
            return "error $e";
        }
    }
    */
}
