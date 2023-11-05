<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Hash; 
use App\Models\User ;
class Edit extends Component
{
    public $user,$name,$email,$username,$password ;

    public function mount($user){
        $this->user = $user ;
        $this->name = $this->user->name ;
        $this->email = $this->user->email ;
        $this->username = $this->user->username ;
        $this->password = "********" ;
    }

    public function updated(){
        $this->user->update([
            'name' => $this->name ,
            'email' => $this->email ,
            'username' => $this->username ,
        ]);
        toast('Success','success') ;
    }

    public function updatedPassword(){
        $this->user->update([
            'password' => Hash::make($this->password) ,
        ]);
    }

    public function render()
    {
        return view('livewire.users.edit');
    }
}
