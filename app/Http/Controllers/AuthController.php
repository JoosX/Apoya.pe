<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
        'name'     => 'required|string',
        'email'    => 'required|email|unique:users',
        'password' => 'required|min:6',
        'dni'      => 'required|string|min:8|max:8|unique:users'
    ]);

    $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'dni'      => $request->dni
    ]);

    return response()->json([
        'message' => 'Usuario registrado exitosamente',
        'user' => $user
    ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Buscar usuario
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        return response()->json([
            'message' => 'Login correcto',
            'user' => $user
        ]);
    }
}