<div class="">

   <div class="flex justify-between items-center w-full">
      <div class="flex gap-x-3">
         @can('cours.create')
         <div class="">
            <a data-tooltip-target="tooltip-default" href="{{route('cours.create')}}"
               class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-2 focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
               <i class="fas fa-plus "></i>
            </a>
            <div id="tooltip-default" role="tooltip"
               class="z-50 inline-block absolute invisible py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
               Nouveau Cours
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
                  <th class="px-4 py-3 text-center">N°</th>
                  <th class="px-4 py-3 text-center">Nom cours</th>
                  <th class="px-4 py-3 text-center">Matière</th>
                  <th class="px-4 py-3 text-center">Année</th>
                  @role('Super Admin')
                  <th class="px-4 py-3 text-center">Publié par</th>

                  <th class="px-4 py-3 text-center"></th>

                  @endrole
                  <th class="px-4 py-3 text-center">Fichier</th>



               </tr>
            </thead>
            <tbody class="bg-white divide-y">

               @forelse($cours as $c)
               <tr class="{{$c->validated == 0 ? 'bg-red-500 text-white font-semibold' : ''}}">
                  <td class="px-4 py-3 text-sm">
                     {{ $loop->iteration }}
                  </td>
                  <td class="px-4 py-3 text-sm">
                     {{$c->name}}
                  </td>
                  <td class="px-4 py-3 text-sm">
                     {{$c->matiere->name}}
                  </td>
                  <td class="px-4 py-3 text-sm">
                     {{$c->niveau->name}}
                  </td>
                  @role('Super Admin')
                  <td> {{$c->user->name}} </td>

                  <td class="py-3 text-sm text-center">
                     @can('validate-cours')
                     @if ($c->validated == false)
                     <form action="{{ route('cours.validateCours', $c->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                           class="px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring">Validé</button>
                     </form>
                     @endif
                     @endcan
                  </td>
                  @endrole
                  <td class="py-3 text-sm text-center">
                     <a class="px-4 py-2 text-sm font-medium leading-5 text-center text-white bg-green-600 border border-transparent rounded-lg  hover:bg-red-700 focus:outline-none focus:ring mx-3"
                        href="{{route('downloadCours',$c->id)}}">Télécharger</a>
                  </td>



                  <td class="px-4 py-3 text-sm">
                     <div class="flex justify-evenly items-center ">
                        <div class="flex justiy-evenly gap-x-2">
                           @can('cours.edit')
                           <a href="{{route('cours.edit',$c->id)}}"> <i class="fas fa-edit text-blue-600 text-lg"></i>
                           </a>
                           @endcan
                           @can('cours.delete')
                           <form method="post" action="{{route('cours.destroy',$c->id)}}" class="">
                              @csrf
                              @method('DELETE')
                              <button type="submit">
                                 <i class="fas fa-trash text-red-600 text-lg"></i>
                              </button>
                           </form>
                           @endcan
                        </div>
                     </div>

                  </td>
               </tr>
               @empty
               <tr>
                  <td colspan="3" class="w-full">
                     <span class="w-full justify-center font-bold h-10 text-center"> Aucun cours n'existe pour le moment
                     </span>
                  </td>
               </tr>
               @endforelse
            </tbody>
         </table>

      </div>
      <div
         class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
         {{ $cours->links() }}
      </div>
   </div>

</div>