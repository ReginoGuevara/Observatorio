<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;

class Students extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $group_id, $nombre, $apellido, $ci, $sexo;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.students.view', [
            'students' => Student::latest()
						->orWhere('group_id', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('apellido', 'LIKE', $keyWord)
						->orWhere('ci', 'LIKE', $keyWord)
						->orWhere('sexo', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->group_id = null;
		$this->nombre = null;
		$this->apellido = null;
		$this->ci = null;
		$this->sexo = null;
    }

    public function store()
    {
        $this->validate([
		'group_id' => 'required',
		'nombre' => 'required',
		'apellido' => 'required',
		'ci' => 'required',
		'sexo' => 'required',
        ]);

        Student::create([ 
			'group_id' => $this-> group_id,
			'nombre' => $this-> nombre,
			'apellido' => $this-> apellido,
			'ci' => $this-> ci,
			'sexo' => $this-> sexo
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Student Successfully created.');
    }

    public function edit($id)
    {
        $record = Student::findOrFail($id);
        $this->selected_id = $id; 
		$this->group_id = $record-> group_id;
		$this->nombre = $record-> nombre;
		$this->apellido = $record-> apellido;
		$this->ci = $record-> ci;
		$this->sexo = $record-> sexo;
    }

    public function update()
    {
        $this->validate([
		'group_id' => 'required',
		'nombre' => 'required',
		'apellido' => 'required',
		'ci' => 'required',
		'sexo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Student::find($this->selected_id);
            $record->update([ 
			'group_id' => $this-> group_id,
			'nombre' => $this-> nombre,
			'apellido' => $this-> apellido,
			'ci' => $this-> ci,
			'sexo' => $this-> sexo
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Student Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Student::where('id', $id)->delete();
        }
    }
}