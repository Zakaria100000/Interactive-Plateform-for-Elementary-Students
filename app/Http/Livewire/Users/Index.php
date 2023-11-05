<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User ;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
   use WithPagination;

   protected $listeners = ['render'=>'render'];

   public $search = '', $trieePar = '', $column = 'name', $columName="", $columnValue="", $attributeName, $column_data_collection ;

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
      $users = $this->columnValue === "" ? 
                  User::search($this->search)->with('permissions')->orderBy($this->column, $this->trieePar == '' ? 'ASC' : $this->trieePar )->paginate(10) :
                  User::filter($this->columName,$this->columnValue)->orderBy($this->column, $this->trieePar == '' ? 'ASC' : $this->trieePar )->paginate(10) ;

      $permissions = Permission::all();
      
      return view('livewire.users.index', compact(['users','permissions']));
   }
}
