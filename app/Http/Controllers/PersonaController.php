<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $q = request()->query('q');

        $personas = Persona::when($q, function($query, $q) {
            $query->where('nombres', 'like', "%{$q}%")
                  ->orWhere('apellidos', 'like', "%{$q}%")
                  ->orWhere('email', 'like', "%{$q}%");
        })->orderBy('created_at', 'desc')->paginate(10);

        return view('personas.index', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación básica
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:persona,email',
            'foto' => 'nullable|image|max:2048',
        ]);
        
        // Split full name into nombres and apellidos (best-effort)
        $full = trim($request->input('nombre'));
        $parts = preg_split('/\s+/', $full);
        $nombres = $parts[0] ?? $full;
        $apellidos = count($parts) > 1 ? implode(' ', array_slice($parts, 1)) : '';

        // Ensure we provide a persona_id because the existing `persona` table
        // uses `persona_id` as primary key (not the default `id`).
        $maxId = Persona::max('persona_id');
        $newId = $maxId ? ($maxId + 1) : 1;

        $data = [
            'persona_id' => $newId,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'cargo' => $request->input('cargo'),
        ];

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('personas', 'public');
            $data['foto_path'] = $path;
        }

        $persona = Persona::create($data);

        return redirect()->route('personas.index')
            ->with('success', 'Persona creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $persona = Persona::where('persona_id', $id)->orWhere('id', $id)->firstOrFail();
        return view('personas.show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $persona = Persona::where('persona_id', $id)->orWhere('id', $id)->firstOrFail();
        return view('personas.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'foto' => 'nullable|image|max:2048',
        ]);

        $persona = Persona::where('persona_id', $id)->orWhere('id', $id)->firstOrFail();

        $full = trim($request->input('nombre'));
        $parts = preg_split('/\s+/', $full);
        $nombres = $parts[0] ?? $full;
        $apellidos = count($parts) > 1 ? implode(' ', array_slice($parts, 1)) : '';

        $data = [
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'cargo' => $request->input('cargo'),
        ];

        if ($request->hasFile('foto')) {
            // delete old file if exists
            if (!empty($persona->foto_path) && \Illuminate\Support\Facades\Storage::disk('public')->exists($persona->foto_path)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($persona->foto_path);
            }
            $path = $request->file('foto')->store('personas', 'public');
            $data['foto_path'] = $path;
        }

        $persona->update($data);

        return redirect()->route('personas.index')
            ->with('success', 'Persona actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $persona = Persona::where('persona_id', $id)->orWhere('id', $id)->firstOrFail();
        if (!empty($persona->foto_path) && \Illuminate\Support\Facades\Storage::disk('public')->exists($persona->foto_path)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($persona->foto_path);
        }
        $persona->delete();

        return redirect()->route('personas.index')
            ->with('success', 'Persona eliminada exitosamente.');
    }
}