

    <!doctype html>
<html lang="fr">
  <head>
  <title>LAB RECHERCHE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300, 400, 700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontEnd')}}/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('frontEnd')}}/css/animate.css">
    <link rel="stylesheet" href="{{asset('frontEnd')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('frontEnd')}}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{asset('frontEnd')}}/css/jquery.timepicker.css">
     <link rel="stylesheet" href="{{asset('frontEnd')}}/css/style3.css">

    <link rel="stylesheet" href="{{asset('frontEnd')}}/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('frontEnd')}}/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('frontEnd')}}/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="{{asset('frontEnd')}}/css/style.css">
    @yield('lien')
  </head>
  <body>
    
   <header role="banner">
      
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
           <img  class="logo" src="{{asset('frontEnd')}}/img/Logo.png" style="width: 170px;height: 70px; text-align: right;">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="{{url('index1')}}">ACCUEIL</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('about')}}">A PROPOS</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  href="{{url('equipe')}}" id="dropdown04" >EQUIPES</a>
                <!--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"-->
                <div class="dropdown-menu" aria-labelledby="dropdown04">
               
                @foreach($equi as $equ)
                  <a class="dropdown-item" href="{{ url('services/'.$equ->id)}}">{{$equ->intitule}}</a>
                  @endforeach
                  
                  
                </div>

              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('news')}}">PROJETS</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="{{url('membre')}}">MEMBRES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('contact')}}">CONTACT</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

@yield('content')
     <section class="cover_1" style="background-image: url('{{asset('frontEnd')}}/img/bg_1.jpg');">
      <div class="container">
        <div class="row text-center justify-content-center">
          <div class="col-md-10">
            <h2 class="heading element-animate"></h2>
            <p class="sub-heading element-animate mb-5"></p>
            <p class="element-animate"><a href="{{url('contact')}}" class="btn btn-primary btn-lg">Contactez nous</a></p>
          </div>
        </div>
      </div>
    </section>


    <footer class="site-footer" role="contentinfo">
      <div class="container">
        <div class="row mb-5 element-animate">
          <div class="col-md-3 mb-5">
            <h3>Autres liens</h3>
            <ul class="footer-link list-unstyled">
              <li><a href="https://www.univ-tlemcen.dz/fr">Université de Tlemcen</a></li>
              <li><a href="https://www.univ-tlemcen.dz/fr/pages/95/laboratoires">Les laboratoires de Tlemcen</a></li>
            
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <h3>Dernieres mises a jours</h3>
            
          </div>
          <div class="col-md-3 mb-5">
            <h3>Pages populaires</h3>
            <ul class="footer-link list-unstyled">
              <li><a href="{{url('membre')}}">Presentation des membres</a></li>
              <li><a href="{{url('equipe')}}">Les équipes</a></li>
              <li><a href="{{url('news')}}">Les projets</a></li>
              
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <h3>Location &amp; Contact</h3>
            <p class="mb-5">22, Rue Abi Ayad Abdelkrim Fg Pasteur B.P 119 13000, Tlemcen, Algérie</p>
            <h4 class="text-uppercase mb-3 h6 text-white">Téléphone</h5>
            <p> 043.41.11.89</p>
            <h4 class="text-uppercase mb-3 h6 text-white">Fax</h5>
            <p class="mb-5"><a href="mailto:info@yourdomain.com">Fax : 043.41.11.91</a></p>
           
            

          </div>
        </div>

        <div class="row pt-md-3 element-animate">
          <div class="col-md-12">
            <hr class="border-t">
          </div>
          <div class="col-md-6 col-sm-12 copyright">
            <p>&copy; 2018 LAB RECHERCHE  </p>
          </div>
     
    </footer>
    @yield('footer')

    <script src="{{asset('frontEnd')}}/js/jquery-3.2.1.min.js"></script>
    <script src="{{asset('frontEnd')}}/js/popper.min.js"></script>
    <script src="{{asset('frontEnd')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('frontEnd')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('frontEnd')}}/js/bootstrap-datepicker.js"></script>
    <script src="{{asset('frontEnd')}}/js/jquery.timepicker.min.js"></script>
    <script src="{{asset('frontEnd')}}/js/jquery.waypoints.min.js"></script>
    <script src="{{asset('frontEnd')}}/js/main.js"></script>
    @yield('script')