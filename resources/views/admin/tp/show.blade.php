<x-app-layout>
   <x-slot name="header" class="flex items-center justify-between">
      <div class="">
         <a href="{{url('/')}}"
            class="uppercase font-semibold text-sm hover:underline hover:text-black hover:font-bold"><i
               class="fas fa-home"> </i></a>
         <span class="text-base font-bold mx-1">/</span>
         <a href="{{route('tp.index')}}"
            class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">Traveaux
            Pratique</a>
         <span class="text-base font-bold mx-1">/</span>
      </div>
      <div class="w-full flex justify-end">
         <a class="px-4 py-2 font-bold leading-5 text-center text-white bg-red-600 border border-transparent rounded-lg  hover:bg-red-700 focus:outline-none focus:ring mx-3"
            href="{{route('tp.download',$tp->id)}}">Télécharger TP</a>
      </div>


   </x-slot>

   <div class="">
      <div class="">

         <div class="container mx-auto my-5 p-5">

            @livewire('tps.show', ['tp' => $tp], key($tp->id))

         </div>
      </div>
   </div>

</x-app-layout>