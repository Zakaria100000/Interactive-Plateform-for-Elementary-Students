<x-app-layout>
   <x-slot name="header" class="flex items-center ">
      <a href="{{url('/')}}" class="uppercase font-semibold text-sm hover:underline hover:text-black hover:font-bold"><i
            class="fas fa-home"> </i></a>
      <span class="text-base font-bold mx-1">/</span>
      <a href="{{route('annee.index')}}"
         class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">Année scolaire</a>
      <span class="text-base font-bold mx-1">/</span>
      <a href="{{isset($annee) ? route('annee.edit',$annee->id) : route('annee.create')}}"
         class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">
         @if(!isset($annee)) Nouvelle @else Mise à jours @endif
      </a>

   </x-slot>

   <div class="">
      <div class="">

         <div class="container mx-auto my-5 p-5">
            @if (!isset($annee))
            @livewire('annees.create')
            @else
            @livewire('annees.edit', ['annee' => $annee], key($annee->id))
            @endif


         </div>
      </div>
   </div>

</x-app-layout>