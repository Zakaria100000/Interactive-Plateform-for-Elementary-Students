<x-app-layout>
   <x-slot name="header" class="flex items-center ">
      <a href="{{url('/')}}" class="uppercase font-semibold text-sm hover:underline hover:text-black hover:font-bold"><i class="fas fa-home"> </i></a> 
      <span class="text-base font-bold mx-1">/</span>
      <a href="{{route('users.index')}}" class="uppercase font-semibold text-sm hover:underline hover:text-black hover:font-bold">{{ __("lang.Users") }}</a> 
      <span class="text-base font-bold mx-1">/</span> 
      <a href="{{ route('permissions.index')}}" class="uppercase font-semibold text-sm hover:underline hover:text-black hover:font-bold"> {{ __('Permissions') }} </a>
   </x-slot>

   @livewire('users.permissions.index')
   
</x-app-layout>
