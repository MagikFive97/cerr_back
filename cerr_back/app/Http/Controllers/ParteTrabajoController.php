<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parte_trabajo;
use Illuminate\Support\Facades\DB;

class ParteTrabajoController extends Controller
{
    public function getAllPartes(Request $request){
        return response()->json([
            'success'=> true,
            'mensaje'=>"Obtengo todos los partesTrabajo desde el controller",
            'data'=> DB::table('parte_trabajo')->get()
            ]);
    }

     public function getIdParte(Request $request , $id){
                return response()->json([
                    'success'=> true,
                    'mensaje'=>"Obtengo el parteTrabajo con id $id desde el controller",
                    'data'=> DB::table('parte_trabajo')->get()->where('id',$id)
                ]);
            }

        public function crearParte(Request $request){
            $datos = $request->only(['Cliente','Fecha','Descripcion','Materiales','Observaciones','Horas_montaje','Horas_totales','Firma_trabajador','Firma_cliente']);
            $request->validate([
                'Cliente'=>'max:32',
                'Fecha'=>'nullable',
                'Descripcion'=>'max:200|nullable',
                'Materiales'=>'max:200|nullable',
                'Observaciones'=>'max:200|nullable',
                 'Horas_montaje' => '',
                 'Horas_totales' => '',
                 'Firma_trabajador' => '',
                 'Firma_cliente' => '',
            ]);
             try{
                        DB::table('parte_trabajo')->insert($datos);
                    }catch(\Exception $e){
                        return "error $e";
                    }
        }

         public function deleteParte(Request $request , $id){
                $usuario = DB::table('parte_trabajo')->where('id',$id)->first();
                if($usuario === null){
                    return response()->json([
                        'success'=>false,
                        'mensaje'=>"parteTrabajo $id no encontrado",
                        'data'=>null,
                    ],404);
                }
                DB::table('parte_trabajo')->where('id',$id)->delete();
                return response()->json([
                    'success'=>false,
                    'mensaje'=>"El parteTrabajo $id fue eliminado",
                    'data'=> $usuario,
                ]);
            }

            public function editarParte(Request $request , $id){
                    $datos = $request->only(['Cliente','Fecha','Descripcion','Materiales','Observaciones','Horas_montaje','Horas_totales','Firma_trabajador','Firma_cliente']);
                    $request->validate([
                            'Cliente'=>'max:32',
                            'Fecha' => 'nullable',
                            'Descripcion'=>'max:200|nullable',
                            'Materiales'=>'max:200|nullable',
                            'Observaciones'=>'max:200|nullable',
                            'Horas_montaje' => '',
                            'Horas_totales' => '',
                            'Firma_trabajador' => '',
                            'Firma_cliente' => '',
                    ]);
                    try{
                        DB::table('parte_trabajo')->where('id',$id)->update($datos);
                    }catch(\Exception $e){
                        return "error $e";
                    }
                }
             public function imprimir(Request $request , $id){
                    $client =  DB::table('parte_trabajo')->get()->where('id',$id);

                     $pdf = \PDF::loadView('pdf' , compact('client'));
                     return $pdf->download('ejemplo.pdf');
             }
}
