<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parte_trabajo;
use Illuminate\Support\Facades\DB;

class ParteTrabajoController extends Controller
{
    public function getAll(Request $request){
        return response()->json([
            'success'=> true,
            'mensaje'=>"Obtengo todos los partes desde el controller",
            'data'=> DB::table('parte_trabajo')->get()
            ]);
    }
}
