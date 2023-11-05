<x-app-layout>
   <x-slot name="header" class="flex items-center ">
      <a href="{{url('/')}}" class="uppercase font-semibold text-sm hover:underline hover:text-black hover:font-bold"><i
            class="fas fa-home"> </i></a>
      <span class="text-base font-bold mx-1">/</span>
      <a href="{{route('matieres.index')}}"
         class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">Matière</a>
      <span class="text-base font-bold mx-1">/</span>
      <a href="{{isset($matiere) ? route('matieres.edit',$matiere->id) : route('matieres.create') }}"
         class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">
         @if(!isset($matiere)) Nouvelle @else Mise à jours @endif
      </a>

   </x-slot>

   <div class="">
      <div class="">

         <div class="container mx-auto my-5 p-5">
            @if (!isset($matiere))
            @livewire('matieres.create')
            @else
            @livewire('matieres.edit', ['matiere' => $matiere], key($matiere->id))
            @endif


         </div>
      </div>
   </div>

</x-app-layout>