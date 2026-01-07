<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $q = request()->query('q');

        $proyectos = Proyecto::when($q, function($query, $q) {
            $query->where('nombre', 'like', "%{$q}%")
                  ->orWhere('descripcion', 'like', "%{$q}%");
        })->orderBy('created_at', 'desc')->paginate(10);

        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Export proyectos to CSV
     */
    public function exportCsv()
    {
        $fileName = 'proyectos_' . date('Ymd_His') . '.csv';
        $proyectos = Proyecto::orderBy('created_at', 'desc')->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$fileName}\"",
        ];

        $callback = function() use ($proyectos) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['id','nombre','descripcion','fecha_de_inicio','fecha_finalizacion','estado','created_at']);

            foreach ($proyectos as $p) {
                fputcsv($handle, [
                    $p->id,
                    $p->nombre,
                    $p->descripcion,
                    $p->fecha_de_inicio,
                    $p->fecha_finalizacion,
                    $p->estado,
                    $p->created_at,
                ]);
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Export proyectos to PDF
     */
    public function exportPdf()
    {
        $proyectos = Proyecto::all();
        
        // Para generar PDF, necesitarías instalar dompdf o similar
        // Por ahora retornamos un mensaje
        return response()->json([
            'message' => 'Funcionalidad de PDF en desarrollo',
            'info' => 'Instala: composer require barryvdh/laravel-dompdf'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación básica
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);
        
        $proyecto = Proyecto::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'fecha_de_inicio' => $request->input('fecha_inicio'),
            'fecha_finalizacion' => $request->input('fecha_fin'),
            'estado' => $request->input('estado') ?? 'planificacion',
        ]);

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.show', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $proyecto = Proyecto::findOrFail($id);
        $proyecto->update([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'fecha_de_inicio' => $request->input('fecha_inicio'),
            'fecha_finalizacion' => $request->input('fecha_fin'),
            'estado' => $request->input('estado'),
        ]);

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto eliminado exitosamente.');
    }
}