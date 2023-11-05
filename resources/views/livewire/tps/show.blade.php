<div>

   <div class="md:flex w-full ">
      <div class="w-full justify-center  mx-2 h-64">
         <div class="">
            <div class="flex flex-col text-gray-700 justify-center w-full">
               <h1 class="text-lg font-semibold underline">Titre TP</h1>
               <div class="flex flex-col gap-y-2 bg-white p-3 shadow-lg rounded-lg mb-4">
                  <span class="font-bold text-3xl ">{{$tp->name}}</span>
               </div>
               <h1 class="text-lg font-semibold underline">Enoncé</h1>
               <div class="flex flex-col gap-y-2 bg-white p-3 shadow-lg rounded-lg mb-4">
                  <span class="font-bold text-lg ">{{$tp->body}}</span>
               </div>
               <h1 class="text-lg font-semibold underline">Image</h1>
               <div class="flex flex-col gap-y-2 bg-white p-3 shadow-lg rounded-lg mb-4">
                  <span class="font-bold text-lg "><img src="{{asset('storage/'.$tp->image)}}" alt=""></span>
               </div>

               <div class="flex flex-col gap-y-3">

                  @foreach ($questions as $partie)
                  <span class="text-lg font-semibold underline"> Partie {{$loop->iteration}} : </span>
                  <div class="flex flex-col gap-y-2 bg-white p-3 shadow-lg rounded-lg mb-4">
                     @foreach ($partie as $question)
                     <div class=" flex justify-between items-center text-md font-semibold text-gray-700">
                        {{$question->name}}
                     </div>
                     @endforeach
                  </div>
                  @endforeach
               </div>

               <h1 class="text-lg font-semibold underline">Simulation</h1>
               <div class="flex flex-col gap-y-2 bg-white p-3 shadow-lg rounded-lg mb-24">
                  <span class="font-bold text-lg ">
                     <iframe src="{{$tp->simulation}}" width="100%" height="600" allowfullscreen>
                     </iframe>
                  </span>
               </div>


            </div>
         </div>
      </div>
   </div>
</div>