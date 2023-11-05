<x-app-layout>
   <x-slot name="header" class="flex items-center ">
      <a href="{{url('/')}}" class="uppercase font-semibold text-sm hover:underline hover:text-black hover:font-bold"><i
            class="fas fa-home"> </i></a>
      <span class="text-base font-bold mx-1">/</span>
      <a href="{{route('tp.index')}}"
         class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">TP </a>
      <span class="text-base font-bold mx-1">/</span>
      <a href="" class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">Question
      </a>


   </x-slot>
   <div class="flex justify-between">

      <div class="text-md mt-3 mb-1">
         TP : <span class="font-bold text-gray-600 ">{{$tp->name}}</span> Pour les : <span
            class="font-bold text-gray-600 ">{{$tp->niveau->name}} {{$tp->matiere->name}}</span>
      </div>
      <a class="px-4 py-2 text-sm font-medium leading-5 text-center
         text-white bg-red-600 border border-transparent rounded-lg 
         hover:bg-red-700 focus:outline-none focus:ring mx-3" href="{{route('tp.download',$tp->id)}}"">Télécharger TP</a>
   </div>

   <div class="">
      <div class="">

         <div class=" container mx-auto my-3">
         @if (!isset($question))
         @livewire('questions.create',['tp' => $tp], key($tp->id))
         @else
         @livewire('questions.edit', ['question' => $question], key($question->id))
         @endif


   </div>
   </div>
   </div>

</x-app-layout>