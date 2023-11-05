<x-app-layout>
   <x-slot name="header" class="flex items-center ">
      <a href="{{url('/')}}" class="uppercase font-semibold text-sm hover:underline hover:text-black hover:font-bold"><i
            class="fas fa-home"> </i></a>
      <span class="text-base font-bold mx-1">/</span>
      <a href="{{route('users.index')}}"
         class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">{{ __("lang.Users")
         }}</a>
      <span class="text-base font-bold mx-1">/</span>
      <a href="{{route('users.show',$user->id)}}"
         class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">Profile</a>

   </x-slot>

   <div class="">
      <div class="">

         <div class="container mx-auto my-5 p-5">
            
            @livewire('users.edit', ['user' => $user], key($user->id))
            
         </div>
      </div>
   </div>

</x-app-layout>