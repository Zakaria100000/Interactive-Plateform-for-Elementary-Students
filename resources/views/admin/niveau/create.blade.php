<x-app-layout>
   <x-slot name="header" class="flex items-center ">
      <a href="{{url('/')}}" class="uppercase font-semibold text-sm hover:underline hover:text-black hover:font-bold"><i
            class="fas fa-home"> </i></a>
      <span class="text-base font-bold mx-1">/</span>
      <a href="{{route('niveau.index')}}"
         class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">Niveau scolaire</a>
      <span class="text-base font-bold mx-1">/</span>
      <a href="{{isset($niveau) ? route('niveau.edit',$niveau->id) : route('niveau.create')}}"
         class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">
         @if(!isset($niveau)) Nouveau @else Mise à jours @endif
      </a>

   </x-slot>

   <div class="">
      <div class="">

         <div class="container mx-auto my-5 p-5">
            @if (!isset($niveau))
            @livewire('niveaux.create')
            @else
            @livewire('niveaux.edit', ['niveau' => $niveau], key($niveau->id))
            @endif


         </div>
      </div>
   </div>

</x-app-layout>