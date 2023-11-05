@extends('layouts.front')

@section('content')

<div class="slider-area ">
   <div class="single-slider section-overly slider-height2 d-flex align-items-center"
      data-background="{{asset('images/hero/physic1.jpg')}}">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <div class="hero-cap text-center">
                  <h2>TP : {{$tp->name}}</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="job-listing-area pt-120 pb-120">
   <div class="container">
      <div style="">
         <div class="">
            <div class="">


               <div class="card shadow-sm" style="margin:1rem 0;">
                  <div class="card-body">
                     <span class="" style="font-size:1.3rem; font-weight:600; ">{{$tp->body}}</span>
                  </div>

               </div>
               <div class="card shadow-sm" style="margin:2.5rem 0 ">
                  <div class="card-body">
                     <span class=""><img src="{{asset('storage/'.$tp->image)}}" alt="" class="img-fluid"></span>
                  </div>
               </div>

               <div class="">

                  @foreach ($questions as $partie)
                  <span class="" style="font-size:1.5rem ; font-weight:800; margin:3rem 0"> Partie {{$loop->iteration}}
                     : </span>
                  <div class="card shadow-sm" style="font-size:1.2rem font-weight:600">
                     <div class="card-body">

                        @foreach ($partie as $question)
                        <div class="">
                           {{$question->name}}
                        </div>
                        @endforeach
                     </div>
                  </div>
                  @endforeach
               </div>

               <h1 class="">Simulation</h1>
               <div class="">
                  <span class="">
                     <iframe src="{{$tp->simulation}}" width="100%" height="600" allowfullscreen>
                     </iframe>
                  </span>
               </div>


            </div>
         </div>
      </div>
   </div>
</div>
@endsection