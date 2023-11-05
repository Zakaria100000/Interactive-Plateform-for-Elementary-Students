<x-app-layout>
    <x-slot name="header" class="flex items-center ">
       <a href="{{url('/')}}" class="uppercase font-semibold text-sm hover:underline hover:text-black hover:font-bold"><i class="fas fa-home"> </i></a> 
       <span class="text-base font-bold mx-1">/</span>
       <a href="{{route('matieres.index')}}" class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">Matiere</a> 
      
    </x-slot>
 
     @livewire('matieres.index')
     
 </x-app-layout>
 