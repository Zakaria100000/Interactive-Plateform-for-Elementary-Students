<div>
   <form wire:submit.prevent="saveNewQuestion" class="w-3/4 mx-auto">
      @csrf
      <div class="w-full flex items-center bg-white rounded-lg shadow-lg py-3 px-5">
         <div class="px-4 py-2 font-semibold">Question :</div>
         <div class="px-4 py-2 flex w-2/3">
            <input type="text" required class="w-full rounded-lg font-semibold px-4 py-2 mx-4" wire:model="name">
            <select class="w-1/4 rounded-lg font-semibold px-4 py-2" wire:model="partie">
               <option selected>Partie </option>
               @for ($i = 1; $i <= $tp->numero_partie; $i++)
                  <option value="{{$i}}"> {{$i}} </option>
                  @endfor
            </select>
         </div>
         <x-button type="submit" class="">Ajouter</x-button>

      </div>
   </form>
   <br>
   @livewire('questions.show', ['tp' => $tp], key($tp->id))

</div>