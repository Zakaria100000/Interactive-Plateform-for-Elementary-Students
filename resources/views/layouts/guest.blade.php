<!DOCTYPE html>
<html x-data="data" lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>Moalim</title>

   <!-- Styles -->
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>
   <script src="{{ asset('js/init-alpine.js') }}"></script>
</head>

<body>
   @include('sweetalert::alert')

   @if(session()->has('accountsuspended'))
   <div class="w-full h-12 bg-gray-200 rounded-lg shadow-lg flex items-center justify-center mb-6">
      <i class="far fa-hand-paper text-3xl text-red-600 mx-4"></i>
      <p class="text-red-600 font-bold text-md text-center ">{{ __("lang.accountSuspended") }}</p>
   </div>
   @endif
   <div class="flex items-center min-h-screen p-6 bg-gray-50">
      <div class="flex-1 h-full max-w-5xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl">
         {{ $slot }}
      </div>
   </div>

</body>

</html>