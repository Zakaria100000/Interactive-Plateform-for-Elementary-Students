<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <title></title>

</head>

<body style="padding 0;border-style:double; border-color:black; border-width:2px">

   <div style="margin:0 10px">


      <div class="" style="text-align: center">
         <h2 style="color:orangered">Traveaux Pratique : {{ $tp->niveau->name }}</h2>
      </div>

      <div class="">
         <h3 style="display:flex; flex-direction:row;">
            <div class="">
               <span style="font-weight:semibold; text-decoration:underline">Matière :</span> {{$tp->matiere->name}}
            </div>
            <div class="">
               <span style="font-weight:semibold; text-decoration:underline">Cours : </span> {{$tp->cour->name}}
            </div>
            <div class="">
               <span style="font-weight:extrabold; text-decoration:underline">Session Educative :</span>
               Traveaux Pratique
            </div>

         </h3>
      </div>

      <div class="">
         <h1 style="color:red; font-weight:bold; text-decoration:underline;">Activité:</h1>
      </div>
      <h1>Enoncé :</h1>
      <p>{{$tp->body}}</p>
      {{-- <img src=" {{$src}} " alt=""> --}}

      @foreach ($questions as $partie)
      <div class="">
         <span style="color:darkblue; font-size:1.5rem; font-weight:bold"> Partie {{$loop->iteration}} : </span> <br />
         @foreach ($partie as $question)
         <ul class="font-size:1rem; font-weight:semibold"> {{$question->name}} </ul>
         @endforeach
      </div>
      @endforeach


   </div>


</body>

</html>