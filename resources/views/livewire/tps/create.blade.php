<div>
   <div class="md:flex w-full ">
      <form wire:submit.prevent="saveNewTP" class="w-3/4 mx-auto">
         @csrf
         <div class="w-full justify-center  mx-2 h-64">
            <div class="bg-white p-3 shadow-lg rounded-lg">
               <div class="flex flex-col text-gray-700 justify-center w-full">

                  <table>
                     <thead>
                        <th></th>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="w-1/3">
                              <div class="px-4 py-2 font-semibold">Titre TP</div>
                           </td>
                           <td>
                              <input type="text" required class="w-full rounded-lg font-semibold px-4 py-2"
                                 wire:model="name" placeholder="">
                           </td>
                        </tr>
                        <tr class="my-4">
                           <td>
                              <div class="px-4 py-2 font-semibold">Nombre des parties</div>
                           </td>
                           <td>
                              <input type="text" required class="w-full rounded-lg font-semibold px-4 py-2"
                                 wire:model="numero_partie" placeholder="">
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="px-4 py-2 font-semibold">Niveau scolaire</div>
                           </td>
                           <td>
                              <select required class="w-full rounded-lg font-semibold px-4 py-2" wire:model="niveau_id">
                                 <option selected> Niveau scolaire </option>
                                 @foreach ($niveaux as $niveau)
                                 <option value="{{$niveau->id}}"> {{$niveau->name}} </option>
                                 @endforeach
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="px-4 py-2 font-semibold">Matiere</div>
                           </td>
                           <td class="my-2">
                              <select required class="w-full rounded-lg font-semibold px-4 py-2" wire:model="matier">
                                 <option selected> Matière </option>
                                 @foreach ($matieres as $matiere)
                                 <option value="{{$matiere->id}}"> {{$matiere->name}} </option>
                                 @endforeach

                              </select>
                           </td>

                        </tr>
                        @if (!is_null($matier))
                        <tr>
                           <td>
                              <div class="px-4 py-2 font-semibold">Cours</div>
                           </td>

                           <td class="my-2">
                              <select class="w-full rounded-lg font-semibold px-4 py-2" wire:model="cour_id">
                                 <option selected> Cours </option>
                                 @foreach ($cours as $cour)
                                 <option value="{{$cour->id}}"> {{$cour->name}} </option>
                                 @endforeach

                              </select>
                           </td>

                        </tr>
                        @endif

                        <tr>
                           <td>
                              <div class="px-4 py-2 font-semibold">Enoncé</div>
                           </td>
                           <td class="my-2">
                              <textarea class="w-full rounded-lg font-semibold px-4 py-2" cols="15"
                                 wire:model="body"> </textarea>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="px-4 py-2 font-semibold">Simulation</div>
                           </td>
                           <td class="my-2">
                              <textarea class="w-full rounded-lg font-semibold px-4 py-2" cols="15"
                                 wire:model="simulation"> </textarea>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="px-4 py-2 font-semibold">Image</div>
                           </td>
                           <td class="my-2">
                              <div>
                                 <div class="py-3 center mx-auto">
                                    <div class="bg-transparent px-4 py-5 rounded-lg text-center ">
                                       <div class="mb-4">
                                          <img class="mx-auto rounded-lg "
                                             src="{{is_null($image_show) ? asset('images/1.jpg') : asset('storage/'.$image_show)}} "
                                             alt="TP image" />
                                       </div>
                                       <label class="cursor-pointer ">
                                          <span
                                             class="mt-2 leading-normal px-4 py-2 font-semibold bg-purple-600 text-white text-sm rounded-full">
                                             Upload image
                                          </span>
                                          <input type='file' class="hidden" wire:model="image" required />
                                       </label>
                                    </div>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td></td>
                           <td class="flex justify-end mt-4">
                              <x-button type="submit" class="flex mr-0 items-center">
                                 Suivant <i class="fas fa-angle-double-right mx-3"></i>
                              </x-button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>

         </div>

      </form>
   </div>
</div>