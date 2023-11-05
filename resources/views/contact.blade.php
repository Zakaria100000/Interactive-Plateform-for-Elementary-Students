@extends('layouts.front')

@section('content')


<div class="slider-area ">
   <div class="single-slider section-overly slider-height2 d-flex align-items-center"
      data-background="assets/img/hero/about.jpg">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <div class="hero-cap text-center">
                  <h2>Contactez nous</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<section class="contact-section">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <h2 class="contact-title">Entrer en contact</h2>
         </div>
         <div class="col-lg-8">
            <form class="form-contact contact_form" method="post" action="{{route('sendMessage')}}">
               @csrf
               <div class="row">
                  <div class="col-12">
                     <div class="form-group">
                        <input class="form-control" required name="nom" id="subject" type="text"
                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre Nom '"
                           placeholder="Votre Nom">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input class="form-control valid" name="email" id="name" type="email"
                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre email  (optionnel)'"
                           placeholder="Votre email  (optionnel)">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input class="form-control valid" required name="phone" id="email" type="text"
                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre numéro de téléphone '"
                           placeholder="Votre numéro de téléphone ">
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="form-group">
                        <textarea class="form-control w-100" required name="message" id="message" cols="30" rows="9"
                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre Message'"
                           placeholder="Votre Message"></textarea>
                     </div>
                  </div>
               </div>
               <div class="form-group mt-3">
                  <button type="submit" class="button button-contactForm btn">ENVOYER</button>
               </div>
            </form>
         </div>
         <div class="col-lg-3 offset-lg-1">
            <div class="media contact-info">
               <span class="contact-info__icon"><i class="ti-home"></i></span>
               <div class="media-body">
                  <h3>Kouba, Alger</h3>
                  <p> 32 Rue Mohamed Benkhala</p>
               </div>
            </div>
            <div class="media contact-info">
               <span class="contact-info__icon"><i class="ti-tablet"></i></span>
               <div class="media-body">
                  <h3>+213 23 60 29 60</h3>
               </div>
            </div>
            <div class="media contact-info">
               <span class="contact-info__icon"><i class="ti-email"></i></span>
               <div class="media-body">
                  <h3>info@Inkidia.dz</h3>
                  <p>Envoyez-nous vos requêtes à tout moment !</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection