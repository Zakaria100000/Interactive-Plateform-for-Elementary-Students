<div class="">

   <div class="flex justify-between items-center w-full">
      <div class="flex gap-x-3">
         @can('users.create')
         <div class="">
            <a data-tooltip-target="tooltip-default" href="{{route('users.create')}}"
               class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-2 focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
               <i class="fas fa-plus "></i>
            </a>
            <div id="tooltip-default" role="tooltip"
               class="z-50 inline-block absolute invisible py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
               {{ __("lang.addUser")}}
               <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
         </div>
         @endcan
         {{-- Filters --}}
         <div x-data="{ openFilter: false }" class="flex gap-x-3">
            <div id="tooltip-filter" role="tooltip"
               class="z-50 inline-block absolute invisible py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
               Filtre
               <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <button data-tooltip-target="tooltip-filter" x-on:click="openFilter = ! openFilter"
               wire:click="resetAttribute()"
               class="text-orange-700 border border-orange-700 hover:bg-orange-700 hover:text-white focus:ring-2 focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
               <i class="fas fa-filter"></i>
            </button>
            <div x-show="openFilter" class="flex gap-x-3">
               <select wire:model="columName" id=""
                  class=" text-sm rounded-lg w-36 focus:ring-blue-500 focus:border-blue-500 block p-1.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                  <option selected disabled value="">Select column</option>
                  <option value="name">Nom et prenom</option>
                  <option value="username">username</option>
                  <option value="email">E-mail</option>
                  <option value="suspended">Status</option>
               </select>
               @if (!empty($column_data_collection))
               <select wire:model="columnValue" id=""
                  class=" text-sm rounded-lg focus:ring-blue-500 w-36 focus:border-blue-500 block p-1.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                  <option selected value="">All</option>
                  @foreach ($column_data_collection as $data)
                  <option value="{{$data[$attributeName]}}">{{$data[$attributeName] == 1 ? 'suspendu' :
                     ($data[$attributeName] == 0 ? 'Active' : $data[$attributeName] )}}</option>
                  @endforeach
               </select>
               @endif
            </div>
         </div>
         {{-- Sort --}}
         <div x-data="{ openSort: false }" class="flex gap-x-3">
            <div id="tooltip-order" role="tooltip"
               class="z-50 inline-block absolute invisible py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
               {{__("lang.order")}}
               <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <button data-tooltip-target="tooltip-order" x-on:click="openSort = ! openSort" wire:click="resetSort()"
               class="text-indigo-700 border border-indigo-700 hover:bg-indigo-700 hover:text-white focus:ring-2 focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
               <i class="fas fa-sort-amount-down"></i>
            </button>
            <div x-show="openSort" class="flex gap-x-3">
               <select wire:model="column"
                  class="text-sm  rounded-lg focus:ring-blue-500 w-36 focus:border-blue-500 block p-1.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                  <option value="name">Nom et prenom</option>
                  <option value="suspended">Compte</option>
                  <option value="lastLoggedIn">Connécté</option>
               </select>
               <select wire:model="trieePar"
                  class="bg-gray-50 border text-sm rounded-lg w-36 focus:ring-blue-500 focus:border-blue-500 block p-1.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                  required>
                  <option value="ASC">De plus A à Z</option>
                  <option value="DESC">De plus Z à A</option>
               </select>
            </div>
         </div>

      </div>
      <div class=" w-1/4 flex-wrap items-stretch">
         <input type="text" class="justify-end my-1 py-2 w-full rounded-lg bg-gray-50 text-sm font-semibold "
            placeholder="Search ..." wire:model="search">
      </div>

   </div>

   <div class="my-3 bg-white shadow-xs w-full rounded-lg border shadow-xs">
      <div class="overflow-x-auto w-full">
         <table class="whitespace-no-wrap ">
            <thead>
               <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                  <th class="px-4 py-3"></th>
                  <th class="px-4 py-3 text-center">{{ __("lang.name")}}</th>
                  <th class="px-4 py-3 text-center">{{ __("lang.account")}}</th>
                  <th class="px-4 py-3 text-center max-w-lg">Permissions</th>
                  <th class="px-4 py-3 text-center">{{ __("lang.lastLogin")}}</th>
                  <th class="px-4 py-3"></th>
                  <th class="px-4 py-3">
                     <x-dropdown>
                        <x-slot name="trigger">
                           <button
                              class="inline-flex  items-center w-full px-2 py-2 text-sm font-semibold transition-colors duration-150 rounded-md align-middle focus:shadow-outline-purple focus:outline-none"
                              @click="toggleOtherUserOptionsMenu" @keydown.escape="closeOtherUserOptionsMenu"
                              aria-label="Account" aria-haspopup="true">
                              <i class="fas fa-ellipsis-v"></i>
                           </button>
                        </x-slot>
                        <x-slot name="content">
                           <div class=" " x-show="isOtherUserOptionsMenuOpen">
                              <ul x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                 @click.outside="closeOtherUserOptionsMenu" @keydown.escape="closeOtherUserOptionsMenu"
                                 class="absolute right-0 p-2 mt-2 space-y-2 text-gray-600 bg-white rounded-md border border-gray-100 shadow-md"
                                 aria-label="submenu">
                                 <a href="{{route('permissions.index')}}"
                                    class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800">Permissions</a>
                              </ul>
                           </div>

                        </x-slot>
                     </x-dropdown>
                  </th>
               </tr>
            </thead>
            <tbody class="bg-white divide-y">
               @foreach($users as $user)
               <tr class="text-gray-700">

                  <td class="px-4 py-3 text-sm">
                     {{ $loop->iteration }}
                  </td>

                  <td class="px-4 py-3 text-sm w-1/3">
                     <div class="flex justify-start items-center gap-x-3">
                        <img
                           src="{{is_null($user->image_url) ? 'https://i1.pngguru.com/preview/137/834/449/cartoon-cartoon-character-avatar-drawing-film-ecommerce-facial-expression-png-clipart.jpg' : asset('storage/'.$user->image_url)}} "
                           alt="user profile picture" class="rounded-full h-12 mx-3">
                        {{ $user->name }}
                     </div>

                  </td>


                  <td class="px-4 py-3 text-sm">
                     <div
                        class="px-3 py-1 text-2xs text-center rounded-full shadow-sm {{ $user->suspended ? 'bg-red-600 text-gray-100' : 'bg-blue-200 text-gray-900' }}">
                        {{$user->suspended ? __("lang.suspended"): 'Active'}}
                     </div>
                  </td>



                  <td class="px-4 py-3 text-sm w-1/4">
                     <div class="flex flex-wrap gap-1">
                        @foreach ($user->permissions as $permission)
                        <span
                           class="bg-green-200 shadow-sm text-green-800  text-xs gap-y-2 text-center  font-semibold mr-1 px-3 pt-1 pb-1.5 mt-1 rounded-full dark:bg-green-200 dark:text-green-900">
                           {{$permission->name}}
                           <a href="{{route('users.unsignPermission',[$user->id,$permission->id])}}"
                              class="text-red-700 font-bold text-xs w-2 cursor-pointer">x</a>
                        </span>
                        @endforeach
                     </div>
                  </td>

                  <td class="px-4 py-3 text-sm w-1/6">
                     {{ !is_null($user->lastLoggedIn) ? $user->lastLoggedIn->diffForHumans() : ''}}
                  </td>

                  <td class="px-4 py-3 text-sm">
                     <div class="flex justify-evenly items-center ">
                        <div class="flex justiy-evenly gap-x-2">
                           <a href="{{route('users.show',$user->id)}}" data-tooltip-target="tooltip-profile"><i
                                 class="far fa-user-circle text-xl"></i></a>
                           <div id="tooltip-profile" role="tooltip"
                              class="z-50 inline-block absolute invisible py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                              Profile
                              <div class="tooltip-arrow" data-popper-arrow></div>
                           </div>
                           <div class="">
                              <button type="button" data-tooltip-target="tooltip-add-permission"
                                 data-modal-toggle="authentication-modal{{$user->id}}">
                                 <i class="far fa-check-circle text-xl text-green-400"></i>
                              </button>
                              @include('admin.users.permissions.add')
                              <div id="tooltip-add-permission" role="tooltip"
                                 class="z-50 inline-block absolute invisible py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                 {{ __("lang.addPermission")}}
                                 <div class="tooltip-arrow" data-popper-arrow></div>
                              </div>
                           </div>
                           <div class="">
                              @if ($user->suspended == true)
                              <button type="button" data-tooltip-target="tooltip-user-suspend"
                                 data-modal-toggle="suspend-user-{{$user->id}}">
                                 <i class="fas fa-user-check text-xl text-blue-600"></i>
                              </button>
                              @else
                              <button type="button" data-tooltip-target="tooltip-user-suspend"
                                 data-modal-toggle="suspend-user-{{$user->id}}">
                                 <i class="fas fa-user-slash text-xl text-red-600"></i>
                              </button>
                              @endif

                              @include('admin.users.suspend')
                              <div id="tooltip-user-suspend" role="tooltip"
                                 class="z-50 inline-block absolute invisible py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                 {{ $user->suspended ? __("lang.activeUser") : __("lang.suspendUser") }}
                                 <div class="tooltip-arrow" data-popper-arrow></div>
                              </div>
                           </div>
                        </div>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>

      </div>
      <div
         class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
         {{ $users->links() }}
      </div>
   </div>

</div>