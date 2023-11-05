<div>
   <div class="md:flex w-full ">
      <form wire:submit.prevent="saveNewMatiere" class="w-2/3 mx-auto">
         @csrf
         <div class="w-full justify-center  mx-2 h-64">
            <div class="bg-white p-3 shadow-lg rounded-lg">
               <div class="text-gray-700 flex justify-center w-full">
                  <div class="w-full flex flex-col justify-center text-sm">
                     <div class="w-full flex items-center">
                        <div class="px-4 py-2 font-semibold">Nom matière</div>
                        <div class="px-4 py-2 flex flex-col w-2/3">
                           <input type="text" required class="w-full rounded-lg font-semibold px-4 py-2"
                              wire:model="name" placeholder="Exp: Physique">
                           @error('name') <span class="text-red-700 font-bold text-sm my-1">{{ $message }}</span>
                           @enderror
                        </div>
                        <x-button type="submit" class="">Enregistrer</x-button>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </form>
   </div>
</div>