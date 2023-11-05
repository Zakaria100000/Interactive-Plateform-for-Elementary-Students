<x-app-layout>
   <x-slot name="header" class="flex items-center ">
      <a href="{{url('/')}}" class="uppercase font-semibold text-sm hover:underline hover:text-black hover:font-bold"><i
            class="fas fa-home"> </i></a>
      <span class="text-base font-bold mx-1">/</span>
      <a href="{{route('tp.index')}}"
         class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">Traveaux
         Pratique</a>
      <span class="text-base font-bold mx-1">/</span>
      <a href="{{isset($tp) ? route('tp.edit',$tp->id) : route('tp.create')}}"
         class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">
         @if(!isset($tp)) Nouvelle @else Mise à jours @endif
      </a>

   </x-slot>

   <div class="">
      <div class="">

         <div class="container mx-auto my-5 p-5">
            @if (!isset($tp))
            @livewire('tps.create')
            @else
            @livewire('tps.edit', ['tp' => $tp], key($tp->id))
            @endif


         </div>
      </div>
   </div>

</x-app-layout>