<x-app-layout>
   <x-slot name="header" class="flex items-center ">
      <a href="{{url('/')}}" class="uppercase font-semibold text-sm hover:underline hover:text-black hover:font-bold"><i
            class="fas fa-home"> </i></a>
      <span class="text-base font-bold mx-1">/</span>
      <a href="{{route('cours.index')}}"
         class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">Cours</a>
      <span class="text-base font-bold mx-1">/</span>
      <a href="{{isset($cours) ? route('cours.edit',$cours->id) : route('cours.create')}}"
         class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">
         @if(!isset($cours)) Nouveau @else mise à jours @endif
      </a>

   </x-slot>

   <div class="">
      <div class="">

         <div class="container mx-auto my-5 p-5">
            @if (!isset($cours))
            @livewire('cours.create')
            @else
            @livewire('cours.edit', ['cours' => $cours], key($cours->id))
            @endif


         </div>
      </div>
   </div>

</x-app-layout>