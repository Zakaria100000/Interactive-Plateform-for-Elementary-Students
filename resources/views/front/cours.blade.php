@extends('layouts.front')

@section('content')
<div class="slider-area ">
   <div class="single-slider slider-height2 d-flex align-items-center"
      data-background="{{asset('images/hero/annee.jpg')}}">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <div class="hero-cap text-center">
                  <h2>Mes Cours</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="job-listing-area pt-60 pb-120">
   <div class="container">
      <div class="row">


         @forelse ($cours as $cour)
         @if ($cour->validated)
         <div class="col-xl-4 col-lg-9 col-md-8" style="margin: 16px 0 ">

            <section class="featured-job-area">
               <div class="card shadow" style="width: 18rem;">
                  <div class="card-body">
                     <h5 class="card-title"> {{$cour->name}} </h5>
                     <p class="card-text"> {{ $cour->resume}} </p>
                     <a href="{{route('downloadCours',$cour->id)}}" class="btn head-btn1">Télécharger le cours</a>
                  </div>
               </div>
            </section>
         </div>
         @endif

         @empty
         <div class="" style=" ">

            <section class="featured-job-area">
               <div class="">
                  <div class="">
                     <h5 class="" style="font-weight: bold; font-size:2rem; text-align:center; width:100%;">
                        Aucun cours
                        n'est
                        disponible
                     </h5>
                  </div>
               </div>
            </section>
         </div>
         @endforelse
      </div>
   </div>
</div>

@endsection