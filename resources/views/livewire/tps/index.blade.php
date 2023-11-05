<div class="">

   <div class="flex justify-between items-center w-full">
      <div class="flex gap-x-3">
         @can('tp.create')
         <div class="">
            <a data-tooltip-target="tooltip-default" href="{{route('tp.create')}}"
               class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-2 focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
               <i class="fas fa-plus "></i>
            </a>
            <div id="tooltip-default" role="tooltip"
               class="z-50 inline-block absolute invisible py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
               Nouvelle Traveaux Pratique
               <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
         </div>
         @endcan

      </div>
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
                  <th class="px-4 py-3">Nom TP</th>
                  @role('Super Admin')
                  <th class="px-4 py-3">Publie par</th>
                  @endrole
                  <th class="px-4 py-3">Niveau</th>
                  <th class="px-4 py-3">Matière</th>
                  <th class="px-4 py-3">Cours</th>
                  <th class="px-4 py-3 text-center"></th>
                  <th class="px-4 py-3 text-center"></th>
                  <th class="px-4 py-3"></th>

               </tr>
            </thead>
            <tbody class="bg-white divide-y">

               @forelse($tps as $tp)
               <tr class="{{$tp->validated == 0 ? 'bg-red-400 text-white font-semibold' : ''}}">
                  <td class="px-4 py-3 text-sm">
                     {{ $loop->iteration }}
                  </td>
                  <td class="px-4 py-3 text-sm"> {{$tp->name}} </td>
                  @role('Super Admin')
                  <td class="px-4 py-3 text-sm"> {{$tp->user->name}} </td>
                  @endrole
                  <td class="px-4 py-3 text-sm"> {{$tp->niveau->name}} </td>
                  <td class="px-4 py-3 text-sm"> {{$tp->matiere->name}} </td>
                  <td class="px-4 py-3 text-sm"> {{$tp->cour->name}} </td>
                  <td class="py-3 text-sm text-center">
                     @can('validate-tp')
                     @if ($tp->validated == false)
                     <form action="{{ route('tp.validateTp', $tp->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                           class="px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring">Validé
                        </button>
                     </form>
                     @endif
                     @endcan
                  </td>
                  <td class="py-3 text-sm text-center">
                     <a class="px-4 py-2 text-sm font-medium leading-5 text-center text-white bg-red-600 border border-transparent rounded-lg  hover:bg-red-700 focus:outline-none focus:ring mx-3"
                        href="{{route('tp.download',$tp->id)}}">Télécharger</a>
                  </td>

                  <td class="px-4 py-3 text-sm">
                     <div class="flex justify-evenly items-center ">
                        <div class="flex justiy-evenly gap-x-2">

                           <a href="{{route('tp.show',$tp->id)}}">
                              <i class="fas fa-eye text-purple-600 text-xl"></i></i>
                           </a>
                           @role('Enseignant')
                           <a href="{{route('question.addQuestion',$tp->id)}}">
                              <i class="fas fa-question text-green-400 text-xl"></i>
                           </a>
                           @endrole
                           <a href="{{route('tp.edit',$tp->id)}}">
                              <i class="fas fa-edit text-blue-600 text-xl"></i>
                           </a>
                           <form method="post" action="{{route('tp.destroy',$tp->id)}}" class="">
                              @csrf
                              @method('DELETE')
                              <button type="submit">
                                 <i class="fas fa-trash text-red-600 text-xl"></i>
                              </button>
                           </form>

                        </div>
                     </div>

                  </td>
               </tr>
               @empty
               <tr>
                  <td colspan="3" class="w-full">
                     <span class="w-full justify-center font-bold h-10 text-center"> Aucun TP n'existe pour le
                        moment </span>
                  </td>
               </tr>
               @endforelse
            </tbody>
         </table>

      </div>
      <div
         class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
         {{ $tps->links() }}
      </div>
   </div>

</div>