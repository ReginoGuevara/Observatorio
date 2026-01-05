<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Group;

class Groups extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $año;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.groups.view', [
            'groups' => Group::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('año', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->año = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'año' => 'required',
        ]);

        Group::create([ 
			'nombre' => $this-> nombre,
			'año' => $this-> año
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Group Successfully created.');
    }

    public function edit($id)
    {
        $record = Group::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->año = $record-> año;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'año' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Group::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'año' => $this-> año
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Group Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Group::where('id', $id)->delete();
        }
    }
}