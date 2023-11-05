@extends('layouts.front')

@section('content')
<div class="slider-area ">
   <div class="slider-height2 d-flex align-items-center" data-background="{{asset('images/hero/matiere.png')}}">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <div class="hero-cap text-center">
                  <h2>Liste des Matières</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="job-listing-area pt-120 pb-120">
   <div class="container">
      <div class="row">

         @foreach ($matieres as $matiere)
         <div class="col-xl-4 col-lg-3 col-md-6" style="margin: 14px 0">
            <section class="featured-job-area">
               <div class="container">
                  <div class="job-tittle">
                     <a href="{{route('annee',$matiere->id)}}">
                        <h2>{{$matiere->name}}</h2>
                     </a>
                  </div>
               </div>
         </div>
         @endforeach


      </div>


   </div>
   </section>

</div>
</div>
</div>
</div>

@endsection