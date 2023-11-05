<header>
   <!-- Header Start -->
   <div class="header-area header-transparrent">
      <div class="headder-top header-sticky">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-3 col-md-2">
                  <!-- Logo -->
                  <div class="logo">
                     <a href="/">
                        <img src="{{asset('images/logo 2.png')}}" alt="" class="img-fluid " style="">
                     </a>
                  </div>
               </div>
               <div class="col-lg-9 col-md-9">
                  <div class="menu-wrapper">
                     <!-- Main-menu -->
                     <div class="main-menu">
                        <nav class="d-none d-lg-block">
                           <ul id="navigation">
                              <li><a href="{{url('/')}}">Acceuil</a></li>
                              <li><a href="{{route('matiere')}}">Matières</a></li>
                              <li><a href="{{route('traveaux_pratqiues')}}">Travaux Pratiques</a></li>
                              <li><a href="{{route('about')}}">À propos</a></li>
                              <li><a href=" {{route('contact')}}">Contact</a></li>
                              @auth
                              <li><a href='#'>Moalim</a>
                                 <ul class='submenu'>
                                    @unlessrole('Eleve')
                                    <li><a href='/dashboard'>Dashboard</a></li>
                                    @endunlessrole
                                    <li>
                                       <form action="{{route('logout')}}" method="POST">
                                          @csrf
                                          <button type="submit" class="btn-link">Logout</button>
                                       </form>
                                 </ul>
                              </li>
                              @endauth
                           </ul>
                        </nav>
                     </div>
                     @guest
                     <div class='header-btn d-none f-right d-lg-block'>
                        <a href="{{route('login')}}" class='btn head-btn1'>Login</a>
                     </div>
                     @endguest


                     <!-- Header-btn -->
                  </div>
               </div>
               <!-- Mobile Menu -->
               <div class="col-12">
                  <div class="mobile_menu d-block d-lg-none"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Header End -->
</header>