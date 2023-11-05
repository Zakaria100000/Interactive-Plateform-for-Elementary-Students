@extends('layouts.front')


@section('content')
{{-- Hero section --}}
<div class="slider-area ">
   <!-- Menu Mobile -->
   <div class="slider-active">
      <div class="single-slider slider-height d-flex align-items-center">
         <div class="container">
            <div class="row">
               <div class="col-xl-6 col-lg-9 col-md-10">
                  <div class="hero__caption">
                     <h1>Trouvez les meilleurs TP interactifs</h1>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-xl-8">

                  <form action="{{route('recherche')}}" class="search-box" method="POST">
                     @csrf
                     <div class="input-form">
                        <input type="text" placeholder="Entrez le TP que vous recherchez" name="recherche">
                     </div>
                     <div class="select-form">
                        <div class="select-itms">
                           <select name="matiere_id" id="select1" style="z-index: 99">
                              <option value="all" selected>Toutes</option>
                              @foreach ($matieres as $matiere)
                              <option value="{{$matiere->id}}">{{$matiere->name}}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="search-form">
                        <button type="submit" class="btn">Rechercher</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
{{-- End Hero section --}}

<div class="online-cv cv-bg section-overly pt-90 pb-120" data-background="{{asset('images/gallery/boy.jpg')}}">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-xl-10">
            <div class="cv-caption text-center">
               <p class="pera2"> Faite la différence en réalisant vos TP en simulation</p>
            </div>
         </div>
      </div>
   </div>
</div>

<section class="featured-job-area feature-padding">
   <div class="container">

      <div class="row">
         <div class="col-lg-12">
            <div class="section-tittle text-center">
               <h2>Travaux Pratiques récents</h2>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-xl-10">

            @foreach ($recentTP as $tp)
            <div class="single-job-items mb-30">
               <div class="job-items">
                  <div class="company-img">
                     <a href="PenduleSimple.html"><img src="" alt=""></a>
                  </div>
                  <div class="job-tittle">
                     <a href="PenduleSimple.html">
                        <h4>{{$tp->name}}</h4>
                     </a>
                     <ul>
                        <li>{{$tp->user->name}}</li>
                        <li>{{$tp->niveau->name}}</li>
                        <li>{{$tp->matiere->name}}</li>
                        {{-- <li><i class="fas fa-map-marker-alt"></i>Alger, Algeria</li>
                        <li>4AM</li> --}}
                     </ul>
                  </div>
               </div>
               <div class="items-link f-right">
                  <a href="{{route('tp.simulation',$tp->id)}}">Voir</a>
                  <span>{{$tp->created_at->diffForHumans()}}</span>
               </div>
            </div>
            @endforeach



         </div>
      </div>
   </div>
</section>

<div class="apply-process-area apply-bg pt-150 pb-150" data-background="{{asset('images/gallery/how-applybg.png')}}">
   <div class="container">

      <div class="row">
         <div class="col-lg-12">
            <div class="section-tittle white-text text-center">
               <h2>Comment ca marche</h2>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-lg-4 col-md-6">
            <div class="single-process text-center mb-30">
               <div class="process-ion">
                  <span class="flaticon-search"></span>
               </div>
               <div class="process-cap">
                  <h5>1. Rechercher votre TP</h5>
                  <p>Vous devez d'abord choisir la matière qui vous convient entre les choix possibles puis
                     choisir votre année pour accéder au catalogue </p>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6">
            <div class="single-process text-center mb-30">
               <div class="process-ion">
                  <span class="flaticon-curriculum-vitae"></span>
               </div>
               <div class="process-cap">
                  <h5>2. Consulter le TP</h5>
                  <p>L'élève accède a son TP parmis ceux déjà présents dans le catalogue</p>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6">
            <div class="single-process text-center mb-30">
               <div class="process-ion">
                  <span class="flaticon-tour"></span>
               </div>
               <div class="process-cap">
                  <h5>3. le completer</h5>
                  <p>L'élève complète le TP interactif en répondant aux questions et finalement arriver a
                     construire la simulation par rapport a l'enonce qu'on lui met entre les mains </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection