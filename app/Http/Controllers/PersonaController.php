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
        $persona = Persona::findOrFail($id);
        return view('personas.show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:persona,email,' . $id . ',persona_id',
            'foto' => 'nullable|image|max:2048',
        ]);

        $persona = Persona::findOrFail($id);

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
        try {
            $persona = Persona::findOrFail($id);
            
            // Delete the photo if exists
            if (!empty($persona->foto_path) && \Illuminate\Support\Facades\Storage::disk('public')->exists($persona->foto_path)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($persona->foto_path);
            }
            
            // Delete the persona
            $persona->delete();

            return redirect()->route('personas.index')
                ->with('success', 'Persona eliminada exitosamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle foreign key constraint errors
            if ($e->getCode() == '23000') {
                return redirect()->route('personas.index')
                    ->with('error', 'No se puede eliminar esta persona porque está relacionada con proyectos u otros registros.');
            }
            return redirect()->route('personas.index')
                ->with('error', 'Error al eliminar la persona: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->route('personas.index')
                ->with('error', 'Error inesperado al eliminar la persona.');
        }
    }

    /**
     * Export personas as CSV
     */
    public function exportCsv()
    {
        $personas = Persona::all();
        
        $filename = 'personas_' . date('Y-m-d_H-i-s') . '.csv';
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $columns = array('ID', 'Nombres', 'Apellidos', 'Email', 'Teléfono', 'Cargo', 'Creado');

        $callback = function() use($personas, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach($personas as $persona) {
                fputcsv($file, array(
                    $persona->persona_id,
                    $persona->nombres,
                    $persona->apellidos,
                    $persona->email,
                    $persona->telefono,
                    $persona->cargo,
                    $persona->created_at
                ));
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Export personas as PDF
     */
    public function exportPdf()
    {
        $personas = Persona::all();
        
        // Para generar PDF, necesitarías instalar dompdf o similar
        // Por ahora retornamos un mensaje
        return response()->json([
            'message' => 'Funcionalidad de PDF en desarrollo',
            'info' => 'Instala: composer require barryvdh/laravel-dompdf'
        ]);
    }
}