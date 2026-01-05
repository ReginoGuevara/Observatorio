<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaApiController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $personas = Persona::when($q, function($query, $q) {
            $query->where('nombres', 'like', "%{$q}%")
                  ->orWhere('apellidos', 'like', "%{$q}%")
                  ->orWhere('email', 'like', "%{$q}%");
        })->orderBy('created_at','desc')->paginate(20);

        return response()->json($personas);
    }

    public function show($id)
    {
        $persona = Persona::findOrFail($id);
        return response()->json($persona);
    }
}
