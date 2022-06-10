<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class passportAuthController extends Controller
{
    public function authenticate(Request $request)
    {

        $validation = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::check()) {

              return  response()->json([
                 'message' => 'Ya estabas logueado',
                 'access_token' => $token,
                 'token_type' => 'Bearer',
                 'success' => true]);

        }

        if (Auth::attempt($validation)) {
            $token = Auth::user()->createToken('AuthTokenLogin')->accessToken;

            return response()->json([
                'message' => 'Se ha logueado correctamente',
                'access_token' => $token,
                'token_type' => 'Bearer',
                'success' => true,
                'rol' => Auth::user()->rol,
           ]);

        }
        return response()->json([
            'error' => 'No autorizado',
        ], 401);

    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'logged out',
            'data_token'=> $request->user()->token(),
        ]);
    }

    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'rol' => 'required',
        ]);

        $user = User::create($request->only([
            'name',
            'email',
            'password',
            'rol'
        ]));

        $token = $user->createToken($user->name)->accessToken;

        return response()->json([
            'message' => 'usuario creado correctamente en la base de datos con token',
            'access_token' => $token,
            'data' => $user,
            'success' => true,
        ]);

    }

    public function getDetail(): \Illuminate\Http\JsonResponse
    {
        $user = Auth::user();
        return response()->json([
            'message' => 'detalles del usuario de la sesion',
            'data' => $user,
            'success' => true
        ], 401);
    }

}
