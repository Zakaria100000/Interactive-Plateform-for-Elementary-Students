<div class="">

   <div class="flex justify-end items-center w-full">

      <div class=" w-1/4 flex-wrap items-stretch">
         <input type="text" class="justify-end my-1 py-2 w-full rounded-lg bg-gray-50 text-sm font-semibold "
            placeholder="Recherche ..." wire:model="search">
      </div>

   </div>

   <div class="my-3 bg-gray-50 shadow-xs w-full rounded-lg border shadow-xs mx-auto shadow-lg">
      <div class="overflow-x-auto w-full">
         <table class="w-full">
            <thead>
               <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                  <th class="px-4 py-3">N°</th>
                  <th class="px-4 py-3">Nom </th>
                  <th class="px-4 py-3">Email</th>
                  <th class="px-4 py-3">Téléphone</th>
                  <th class="px-4 py-3">Sujet</th>
                  <th class="px-4 py-3"></th>

               </tr>
            </thead>
            <tbody class="bg-white divide-y">

               @forelse($messages as $message)
               <tr class="text-gray-700 {{$message->read == false ? 'bg-gray-200' : ''}} ">
                  <td class="px-4 py-3 text-sm">
                     {{ $loop->iteration }}
                  </td>
                  <td class="px-4 py-3 text-sm">
                     {{$message->nom}}
                  </td>
                  <td class="px-4 py-3 text-sm">
                     {{$message->email}}
                  </td>
                  <td class="px-4 py-3 text-sm">
                     {{$message->phone}}
                  </td>
                  <td class="px-4 py-3 text-sm">
                     {{ substr($message->message, 0,100) . '...'}}
                  </td>
                  <td class="px-4 py-3 text-sm">
                     <div class="flex justify-evenly items-center ">
                        <div class="flex justiy-evenly gap-x-2">
                           <a href="{{route('messages.open',$message->id)}}">
                              <i
                                 class="fas {{ $message->read == false ? 'fa-envelope' : 'fa-envelope-open' }}  text-lg text-green-500 mx-3"></i>
                           </a>
                           <form method="post" action="{{route('messages.destroy',$message->id)}}" class="">
                              @csrf
                              @method('DELETE')
                              <button type="submit">
                                 <i class="fas fa-trash text-red-600 text-lg"></i>
                              </button>
                           </form>

                        </div>
                     </div>

                  </td>
               </tr>
               @empty
               <tr>
                  <td colspan="5" class="w-full">
                     <span class="w-full justify-center font-bold h-10 text-center"> Aucun message n'existe pour le
                        moment </span>
                  </td>
               </tr>
               @endforelse
            </tbody>
         </table>

      </div>
      <div
         class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
         {{ $messages->links() }}
      </div>
   </div>

</div>