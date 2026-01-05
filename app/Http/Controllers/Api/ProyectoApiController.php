<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoApiController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $proyectos = Proyecto::when($q, function($query, $q) {
            $query->where('nombre', 'like', "%{$q}%");
        })->orderBy('created_at','desc')->paginate(20);

        return response()->json($proyectos);
    }

    public function show($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return response()->json($proyecto);
    }
}
