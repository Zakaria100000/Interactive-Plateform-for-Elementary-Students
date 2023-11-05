<x-app-layout>
   <x-slot name="header" class="flex items-center ">
      <a href="{{url('/')}}" class="uppercase font-semibold text-sm hover:underline hover:text-black hover:font-bold"><i
            class="fas fa-home"> </i></a>
      <span class="text-base font-bold mx-1">/</span>
      <a href="{{route('cours.index')}}"
         class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">Cours</a>

   </x-slot>

   @livewire('cours.index')

</x-app-layout>