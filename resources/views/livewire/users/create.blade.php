<div>
   <div class="md:flex no-wrap md:-mx-2 ">
      <div class="w-full md:w-3/12 md:mx-2">
         <form wire:submit.prevent="saveNewUser">
            @csrf
            <div>
               <div class="py-3 center mx-auto">
                  <div class="bg-transparent px-4 py-5 rounded-lg text-center w-54">
                     <div class="mb-4">
                        <img class="w-auto mx-auto rounded-full object-cover object-center"
                           src="{{is_null($image_show) ? 'https://i1.pngguru.com/preview/137/834/449/cartoon-cartoon-character-avatar-drawing-film-ecommerce-facial-expression-png-clipart.jpg' : asset('storage/'.$image_show)}} "
                           alt="user profile image" />
                     </div>
                     <label class="cursor-pointer mt-6">
                        <span
                           class="mt-2 leading-normal px-4 py-2 font-semibold bg-purple-600 text-white text-sm rounded-full">
                           Upload image
                        </span>
                        <input type='file' class="hidden" wire:model="imageUrl" />
                     </label>
                  </div>
               </div>
            </div>
      </div>

      <div class="w-full md:w-9/12 mx-2 h-64">
         <div class="bg-white p-3 shadow-lg rounded-lg">

            <div class="text-gray-700">
               <div class="grid md:grid-cols-1 text-sm">
                  <div class="grid grid-cols-2">
                     <div class="px-4 py-2 font-semibold">Name</div>
                     <div class="px-4 py-2 flex flex-col">
                        <input type="text" required class="w-full rounded-lg font-semibold px-4 py-2" wire:model="name">
                        @error('name') <span class="text-red-700 font-bold text-sm my-1">{{ $message }}</span> @enderror

                     </div>
                  </div>
                  <div class="grid grid-cols-2">
                     <div class="px-4 py-2 font-semibold">Username</div>
                     <div class="px-4 py-2 flex flex-col">
                        <input type="text" required class="w-full rounded-lg font-semibold px-4 py-2"
                           wire:model="username">
                        @error('username') <span class="text-red-700 font-bold text-sm my-1">{{ $message }}</span>
                        @enderror

                     </div>
                  </div>
                  <div class="grid grid-cols-2">
                     <div class="px-4 py-2 font-semibold">E-mail</div>
                     <div class="px-4 py-2 flex flex-col">
                        <input type="email" required class="w-full rounded-lg font-semibold px-4 py-2"
                           wire:model="email">
                        @error('email') <span class="text-red-700 font-bold text-sm my-1">{{ $message }}</span>
                        @enderror

                     </div>
                  </div>
                  <div class="grid grid-cols-2">
                     <div class="px-4 py-2 font-semibold">Role</div>
                     <div class="px-4 py-2 flex flex-col">
                        <select class="w-full rounded-lg font-semibold px-4 py-2" wire:model="role">
                           <option selected>Role</option>
                           <option value="Enseignant">Enseignant</option>
                           <option value="Eleve">Élève</option>
                        </select>
                     </div>
                  </div>
                  <div class="grid grid-cols-2">
                     <div class="px-4 py-2 font-semibold">Password</div>
                     <div class="px-4 py-2 flex flex-col">
                        <input type="password" required class="w-full rounded-lg font-semibold px-4 py-2"
                           wire:model="password">
                        @error('password') <span class="text-red-700 font-bold text-sm my-1">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="grid grid-cols-2">
                     <div class="px-4 py-2 font-semibold">Confirm password</div>
                     <div class="px-4 py-2 flex flex-col">
                        <input type="password" required class="w-full rounded-lg font-semibold px-4 py-2"
                           wire:model="password_confirmation">
                     </div>
                  </div>
                  <div class="grid grid-cols-1 my-3">
                     <x-button type="submit">Save user</x-button>
                  </div>
               </div>
            </div>
         </div>
         </form>
      </div>
   </div>
</div>