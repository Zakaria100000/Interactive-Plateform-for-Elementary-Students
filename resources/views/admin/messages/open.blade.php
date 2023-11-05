<x-app-layout>
   <x-slot name="header" class="flex items-center ">
      <a href="{{url('/')}}" class="uppercase font-semibold text-sm hover:underline hover:text-black hover:font-bold"><i
            class="fas fa-home"> </i></a>
      <span class="text-base font-bold mx-1">/</span>
      <a href="{{route('matieres.index')}}"
         class="text-base font-semibold uppercase hover:underline hover:text-black hover:font-bold">INBOX</a>

   </x-slot>

   <div class="">
      <div class="">

         <div class="container mx-auto my-5 p-5">

            <div class="w-full flex flex-col gap-y-3">

               <div class="w-full flex gap-x-3">
                  <div class="w-1/3">
                     <h1 class="text-lg font-semibold">Nom : </h1>
                     <div class="bg-white py-4 px-6 rounded-lg shadow my-2 font-bold">
                        {{$message->nom}}
                     </div>
                  </div>
                  <div class="w-1/3">
                     <h1 class="text-lg font-semibold">Email : </h1>
                     <div class="bg-white py-4 px-6 rounded-lg shadow my-2 font-bold">
                        {{$message->email}}
                     </div>
                  </div>
                  <div class="w-1/3">
                     <h1 class="text-lg font-semibold">Téléphone : </h1>
                     <div class="bg-white py-4 px-6 rounded-lg shadow my-2 font-bold">
                        {{$message->phone}}
                     </div>
                  </div>
               </div>
               <div class="">
                  <h1 class="text-lg font-semibold">Message : </h1>
                  <div class="bg-white py-4 px-6 rounded-lg shadow my-2 font-bold">
                     {{$message->message}}
                  </div>
               </div>

            </div>
         </div>

      </div>
   </div>

</x-app-layout>