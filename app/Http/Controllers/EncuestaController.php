<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use Illuminate\Http\Request;


class EncuestaController extends Controller
{
      public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string',
            'email'          => 'required|email',
            'phone'          => 'required|string',
            'support_type'   => 'required|string',
            'message'        => 'nullable|string',
            'organizacion_nombre' => 'required|string'

        ]);

        $encuesta = Encuesta::create($request->all());

        return response()->json([
            'message' => 'Encuesta guardada correctamente',
            'encuesta' => $encuesta
        ]);
    }
}
