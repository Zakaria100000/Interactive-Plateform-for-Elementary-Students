<?php

namespace App\Http\Livewire\Niveaux;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Niveau ;

class Index extends Component
{
    use WithPagination;

    protected $listeners = ['render'=>'render'];
 
    public $search = '', $trieePar = '', $column = 'name', $columName="", $columnValue="", $attributeName, $column_data_collection ;
 
    public function updatedColumName(){
       $this->attributeName = $this->columName;
       $this->column_data_collection = Niveau::orderBy('name','ASC')->get(['id',$this->attributeName]);
    }
    
    public function resetAttribute(){
       $this->reset(['columName', 'columnValue', 'attributeName', 'column_data_collection']);
    }
    public function resetSort(){
       $this->reset(['trieePar', 'column']);
    }
 
    public function render()
    {
       $niveaux = $this->columnValue === "" ? 
                   Niveau::search($this->search)->orderBy($this->column, $this->trieePar == '' ? 'ASC' : $this->trieePar )->paginate(10) :
                   Niveau::filter($this->columName,$this->columnValue)->orderBy($this->column, $this->trieePar == '' ? 'ASC' : $this->trieePar )->paginate(10) ;
 
       return view('livewire.niveaux.index', compact(['niveaux']));
    }
}
