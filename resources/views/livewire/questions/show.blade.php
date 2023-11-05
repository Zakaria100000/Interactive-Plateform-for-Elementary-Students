<div>
   <div class="flex gap-x-3">

      @foreach ($questions as $partie)
      <div class="w-full bg-white rounded-lg shadow-lg px-6 py-4 ">
         <span class="text-xl font-bold "> Partie {{$loop->iteration}} : </span>
         @foreach ($partie as $question)
         <span class=" flex justify-between items-center text-md font-semibold text-gray-700">
            @if($edit && $question->id == $c )
            <div class="w-full">
               {{-- <form wire:submit.prevent="updateQuestion" class="mx-auto">
                  @csrf --}}
                  <div class="w-full">
                     <div class="flex gap-x-1">
                        <input type="text" class="w-full text-sm rounded-lg" wire:model="name">
                        <select class="w-16 text-sm rounded-lg" wire:model="partie">
                           @for ($i = 1; $i <= $tp->numero_partie; $i++)
                              <option value="{{$i}}" {{$p==$i ? 'selected' : '' }}> {{$i}} </option>
                              @endfor
                        </select>
                        <button wire:click="updateQuestion({{$question->id}})" class=""><i
                              class="fas fa-angle-double-right text-xl mx-3"></i></button>
                     </div>


                  </div>
                  {{--
               </form> --}}
            </div>
            @else
            {{$question->name}}
            <div class="flex justify-center gap-x-2 mx-3 my-3 ">
               <button wire:click="editQUestion({{$question->id}})"><i class="fas fa-edit text-blue-600"></i></button>
               <form method="POST" action="{{route('question.destroy',$question->id)}}">
                  @csrf
                  @method('DELETE')
                  <button class="" type="submit"><i class="fas fa-trash-alt text-red-500"></i></button>
               </form>
            </div>

            @endif



         </span>
         @endforeach
      </div>
      @endforeach
   </div>
</div>