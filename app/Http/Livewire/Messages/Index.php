<?php

namespace App\Http\Livewire\Messages;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Message ;

class Index extends Component
{
    use WithPagination;

    protected $listeners = ['render'=>'render'];
 
    public $search = '', $trieePar = '', $column = 'created_at', $columName="", $columnValue="", $attributeName, $column_data_collection ;
 
    public function updatedColumName(){
       $this->attributeName = $this->columName;
       $this->column_data_collection = User::orderBy('name','ASC')->get(['id',$this->attributeName]);
    }
    
    public function resetAttribute(){
       $this->reset(['columName', 'columnValue', 'attributeName', 'column_data_collection']);
    }
    public function resetSort(){
       $this->reset(['trieePar', 'column']);
    }
 
    public function render()
    {
       $messages = $this->columnValue === "" ? 
                   Message::search($this->search)->orderBy($this->column, $this->trieePar == '' ? 'DESC' : $this->trieePar )->paginate(10) :
                   Message::filter($this->columName,$this->columnValue)->orderBy($this->column, $this->trieePar == '' ? 'DESC' : $this->trieePar )->paginate(10) ;
 
       return view('livewire.messages.index', compact(['messages']));
    }
}
