<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\User;

class Create extends Component
{
   use WithFileUploads, AuthorizesRequests;



   public $imageUrl, $name, $username, $email, $password, $password_confirmation,$image_show, $role ;

   protected $rules = [
      'name' => 'required|string|max:255',
      'email' => 'string|email|max:255|unique:users,email',
      'username' => 'string|min:8',
      'password' => 'required|min:8|confirmed',
  ];

   public function updatedImageUrl(){
      
      $this->validate([
         'imageUrl' => 'image|max:2048', // 2MB Max
      ]);

      $this->image_show = $this->imageUrl->store('profile_images','public');
      
   }

   public function saveNewUser(){

      $this->authorize('users.store');

      $this->validate();

      $user = User::create([
         'name' => $this->name,
         'username' => $this->username,
         'email' => $this->email,
         'password' => Hash::make($this->password),
         'image_url' => $this->image_show,
      ]);

      $user->assignRole($this->role) ;

      toast('user added successfully','success');

      return redirect()->route('users.index');
   }

   public function render()
   {
      return view('livewire.users.create');
   }
}
