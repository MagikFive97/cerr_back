<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
      public function getAllTrabajadores(Request $request){
            return response()->json([
                'success'=> true,
                'mensaje'=>"Obtengo todos los trabajadores desde el controller",
                'data'=> DB::table('employee')->get()
                ]);
        }


         public function getIdTrabajador(Request $request , $id){
                return response()->json([
                    'success'=> true,
                    'mensaje'=>"Obtengo el trabajador con id $id desde el controller",
                    'data'=> DB::table('employee')->get()->where('id',$id)
                ]);
            }

        public function crearTrabajador(Request $request){
            $datos = $request->only(['Nombre','Dni','Email','Seguridad_Social','Telefono','Direccion','Cotizacion','Categoria','Antiguedad','Cod_Contrato','Precio_Horas','Observaciones']);
            $request->validate([
                'Nombre'=>'max:32',
                'Dni'=>'max:9',
                'Email'=>'nullable',
                'Seguridad_Social'=>'max:64|nullable',
                'Telefono'=>'max:9',
                'Direccion'=>'max:24',
                'Categoria' => 'max:24',
                'Cotizacion' => 'max:24',
                'Antiguedad' => 'max:24',
                'Cod_Contrato' => 'max:60',
                'Precio_Horas' => 'max:6',
                'Observaciones' => 'max:60'
            ]);
             try{
                        DB::table('employee')->insert($datos);
                    }catch(\Exception $e){
                        return "error $e";
                    }
        }

         public function deleteTrabajador(Request $request , $id){
                $usuario = DB::table('employee')->where('id',$id)->first();
                if($usuario === null){
                    return response()->json([
                        'success'=>false,
                        'mensaje'=>"usuario $id no encontrado",
                        'data'=>null,
                    ],404);
                }
                DB::table('employee')->where('id',$id)->delete();
                return response()->json([
                    'success'=>false,
                    'mensaje'=>"El usuario $id fue eliminado",
                    'data'=> $usuario,
                ]);
            }

         public function editarTrabajador(Request $request , $id){
                    $datos = $request->only(['Nombre','Dni','Email','Seguridad_Social','Telefono','Direccion','Cotizacion','Categoria','Antiguedad','Cod_Contrato','Precio_Horas','Observaciones']);
                    $request->validate([
                                    'Nombre'=>'max:32',
                                    'Dni'=>'max:9',
                                    'Email'=>'nullable',
                                    'Seguridad_Social'=>'max:64|nullable',
                                    'Telefono'=>'max:9',
                                    'Direccion'=>'max:24',
                                    'Categoria' => 'max:24',
                                    'Cotizacion' => 'max:24',
                                    'Antiguedad' => 'max:24',
                                    'Cod_Contrato' => 'max:60',
                                    'Precio_Horas' => 'max:6',
                                    'Observaciones' => 'max:60'
                    ]);
                    try{
                        DB::table('employee')->where('id',$id)->update($datos);
                    }catch(\Exception $e){
                        return "error $e";
                    }
                }

}
