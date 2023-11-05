<div class="">

   <div class="flex justify-between items-center w-full">
      <div class="">
         <button type="button" data-modal-toggle="createPermission" class="text-blue-700 w-10 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-2 focus:ring-blue-300 font-medium rounded-full text-xl p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
            <i class="fas fa-plus "></i>
         </button>
         @include('admin.users.permissions.create')

      </div>
  </div>
   
   <div class="my-3 bg-white shadow-xs w-full rounded-lg border shadow-xs">
       <div class="overflow-x-auto w-full">
           <table class="w-full whitespace-no-wrap">
               <thead>
               <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                   <th class="px-4 py-3"></th>
                   <th class="px-4 py-3">Permissions</th>
                   <th class="px-4 py-3">{{__("lang.added")}}</th>
                   <th class="px-4 py-3"></th>
                   
               </tr>
               </thead>
               <tbody class="bg-white divide-y">
               @foreach($permissions as $permission)
                   <tr class="text-gray-700">

                       <td class="px-4 py-3 text-sm">
                           {{ $loop->iteration }}
                       </td>
                       <td class="px-4 py-3 text-sm flex items-center gap-x-3">
                           {{ $permission->name }}
                       </td>
                      
                       <td class="px-4 py-3 text-sm">
                           {{ $permission->created_at->diffForHumans() }}
                       </td>
                       <td class="px-4 py-3 text-sm">
                          <div class="flex justify-between ">
                             <form action="{{route('permissions.destroy',$permission->id)}}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit"><i class="fas fa-minus text-2xl"></i></button>

                             </form>
                           {{-- <a href="{{route('users.show',$user->id)}}"><i class="far fa-user-circle text-2xl"></i></a>  --}}
                          </div>
                       </td>
                   </tr>
               @endforeach
               </tbody>
           </table>
       </div>
       <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
           {{ $permissions->links() }}
       </div>
   </div>

</div>