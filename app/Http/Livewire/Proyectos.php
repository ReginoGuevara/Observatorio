<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Proyecto;

class Proyectos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $proyecto_id, $codigo, $acronimo, $fecha_de_inicio, $fecha_finalizacion, $pagina_web, $mandato, $uri, $tipo_proyecto_cod__tipo_cod, $categoria_cod, $estado_cod;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.proyectos.view', [
            'proyectos' => Proyecto::latest()
						->orWhere('proyecto_id', 'LIKE', $keyWord)
						->orWhere('codigo', 'LIKE', $keyWord)
						->orWhere('acronimo', 'LIKE', $keyWord)
						->orWhere('fecha_de_inicio', 'LIKE', $keyWord)
						->orWhere('fecha_finalizacion', 'LIKE', $keyWord)
						->orWhere('pagina_web', 'LIKE', $keyWord)
						->orWhere('mandato', 'LIKE', $keyWord)
						->orWhere('uri', 'LIKE', $keyWord)
						->orWhere('tipo_proyecto_cod__tipo_cod', 'LIKE', $keyWord)
						->orWhere('categoria_cod', 'LIKE', $keyWord)
						->orWhere('estado_cod', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->proyecto_id = null;
		$this->codigo = null;
		$this->acronimo = null;
		$this->fecha_de_inicio = null;
		$this->fecha_finalizacion = null;
		$this->pagina_web = null;
		$this->mandato = null;
		$this->uri = null;
		$this->tipo_proyecto_cod__tipo_cod = null;
		$this->categoria_cod = null;
		$this->estado_cod = null;
    }

    public function store()
    {
        $this->validate([
		'proyecto_id' => 'required',
		'codigo' => 'required',
		'fecha_de_inicio' => 'required',
		'fecha_finalizacion' => 'required',
		'pagina_web' => 'required',
		'mandato' => 'required',
		'uri' => 'required',
        ]);

        Proyecto::create([ 
			'proyecto_id' => $this-> proyecto_id,
			'codigo' => $this-> codigo,
			'acronimo' => $this-> acronimo,
			'fecha_de_inicio' => $this-> fecha_de_inicio,
			'fecha_finalizacion' => $this-> fecha_finalizacion,
			'pagina_web' => $this-> pagina_web,
			'mandato' => $this-> mandato,
			'uri' => $this-> uri,
			'tipo_proyecto_cod__tipo_cod' => $this-> tipo_proyecto_cod__tipo_cod,
			'categoria_cod' => $this-> categoria_cod,
			'estado_cod' => $this-> estado_cod
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Proyecto Successfully created.');
    }

    public function edit($id)
    {
        $record = Proyecto::findOrFail($id);
        $this->selected_id = $id; 
		$this->proyecto_id = $record-> proyecto_id;
		$this->codigo = $record-> codigo;
		$this->acronimo = $record-> acronimo;
		$this->fecha_de_inicio = $record-> fecha_de_inicio;
		$this->fecha_finalizacion = $record-> fecha_finalizacion;
		$this->pagina_web = $record-> pagina_web;
		$this->mandato = $record-> mandato;
		$this->uri = $record-> uri;
		$this->tipo_proyecto_cod__tipo_cod = $record-> tipo_proyecto_cod__tipo_cod;
		$this->categoria_cod = $record-> categoria_cod;
		$this->estado_cod = $record-> estado_cod;
    }

    public function update()
    {
        $this->validate([
		'proyecto_id' => 'required',
		'codigo' => 'required',
		'fecha_de_inicio' => 'required',
		'fecha_finalizacion' => 'required',
		'pagina_web' => 'required',
		'mandato' => 'required',
		'uri' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Proyecto::find($this->selected_id);
            $record->update([ 
			'proyecto_id' => $this-> proyecto_id,
			'codigo' => $this-> codigo,
			'acronimo' => $this-> acronimo,
			'fecha_de_inicio' => $this-> fecha_de_inicio,
			'fecha_finalizacion' => $this-> fecha_finalizacion,
			'pagina_web' => $this-> pagina_web,
			'mandato' => $this-> mandato,
			'uri' => $this-> uri,
			'tipo_proyecto_cod__tipo_cod' => $this-> tipo_proyecto_cod__tipo_cod,
			'categoria_cod' => $this-> categoria_cod,
			'estado_cod' => $this-> estado_cod
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Proyecto Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Proyecto::where('id', $id)->delete();
        }
    }
}