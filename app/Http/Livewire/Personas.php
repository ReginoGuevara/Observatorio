<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Persona;

class Personas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $persona_id, $nombres, $apellidos, $genero, $foto, $domicilio, $documento_nacional_identidad, $orcid, $identificador_registro_personas, $scopus_author_id, $research_id, $isni;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.personas.view', [
            'personas' => Persona::latest()
						->orWhere('persona_id', 'LIKE', $keyWord)
						->orWhere('nombres', 'LIKE', $keyWord)
						->orWhere('apellidos', 'LIKE', $keyWord)
						->orWhere('genero', 'LIKE', $keyWord)
						->orWhere('foto', 'LIKE', $keyWord)
						->orWhere('domicilio', 'LIKE', $keyWord)
						->orWhere('documento_nacional_identidad', 'LIKE', $keyWord)
						->orWhere('orcid', 'LIKE', $keyWord)
						->orWhere('identificador_registro_personas', 'LIKE', $keyWord)
						->orWhere('scopus_author_id', 'LIKE', $keyWord)
						->orWhere('research_id', 'LIKE', $keyWord)
						->orWhere('isni', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->persona_id = null;
		$this->nombres = null;
		$this->apellidos = null;
		$this->genero = null;
		$this->foto = null;
		$this->domicilio = null;
		$this->documento_nacional_identidad = null;
		$this->orcid = null;
		$this->identificador_registro_personas = null;
		$this->scopus_author_id = null;
		$this->research_id = null;
		$this->isni = null;
    }

    public function store()
    {
        $this->validate([
		'persona_id' => 'required',
		'nombres' => 'required',
		'apellidos' => 'required',
		'genero' => 'required',
		'domicilio' => 'required',
		'documento_nacional_identidad' => 'required',
        ]);

        Persona::create([ 
			'persona_id' => $this-> persona_id,
			'nombres' => $this-> nombres,
			'apellidos' => $this-> apellidos,
			'genero' => $this-> genero,
			'foto' => $this-> foto,
			'domicilio' => $this-> domicilio,
			'documento_nacional_identidad' => $this-> documento_nacional_identidad,
			'orcid' => $this-> orcid,
			'identificador_registro_personas' => $this-> identificador_registro_personas,
			'scopus_author_id' => $this-> scopus_author_id,
			'research_id' => $this-> research_id,
			'isni' => $this-> isni
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Persona Successfully created.');
    }

    public function edit($id)
    {
        $record = Persona::findOrFail($id);
        $this->selected_id = $id; 
		$this->persona_id = $record-> persona_id;
		$this->nombres = $record-> nombres;
		$this->apellidos = $record-> apellidos;
		$this->genero = $record-> genero;
		$this->foto = $record-> foto;
		$this->domicilio = $record-> domicilio;
		$this->documento_nacional_identidad = $record-> documento_nacional_identidad;
		$this->orcid = $record-> orcid;
		$this->identificador_registro_personas = $record-> identificador_registro_personas;
		$this->scopus_author_id = $record-> scopus_author_id;
		$this->research_id = $record-> research_id;
		$this->isni = $record-> isni;
    }

    public function update()
    {
        $this->validate([
		'persona_id' => 'required',
		'nombres' => 'required',
		'apellidos' => 'required',
		'genero' => 'required',
		'domicilio' => 'required',
		'documento_nacional_identidad' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Persona::find($this->selected_id);
            $record->update([ 
			'persona_id' => $this-> persona_id,
			'nombres' => $this-> nombres,
			'apellidos' => $this-> apellidos,
			'genero' => $this-> genero,
			'foto' => $this-> foto,
			'domicilio' => $this-> domicilio,
			'documento_nacional_identidad' => $this-> documento_nacional_identidad,
			'orcid' => $this-> orcid,
			'identificador_registro_personas' => $this-> identificador_registro_personas,
			'scopus_author_id' => $this-> scopus_author_id,
			'research_id' => $this-> research_id,
			'isni' => $this-> isni
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Persona Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Persona::where('id', $id)->delete();
        }
    }
}