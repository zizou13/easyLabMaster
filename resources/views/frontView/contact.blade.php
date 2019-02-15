

    
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
   
  </head>
  <body>
    <!--src="{{asset('uploads/photo/1525782794.png')}}"-->
   <header role="banner">
      
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
           <img  class="logo" src="{{asset('frontEnd')}}/img/Logo.png"
            style="width: 170px;height: 70px; text-align: right;">
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
              <a class="nav-link" href="{{url('actuality')}}">ACTUALITES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('contact')}}">CONTACT</a>
              </li>
              <li>
              <form action="/recherche" method="POST" class="sidebar-form" role="search" style="margin-top: 20px;">
      {{ csrf_field() }}
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>

              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>















<!--****************************************************************-->
    <!-- END header -->
    <style type="text/css">
      .invalid-feedback{
        display: block;
      }
    </style>
    <section class="home-slider inner-page owl-carousel">
      <div class="slider-item" style="background-image:url('{{asset('frontEnd')}}/img/contact.jpg');">
        
        <div class="container">
          <div class="row slider-text align-items-center">
            <div class="col-md-7 col-sm-12 element-animate">
              <h1>Contactez-nous</h1>
              
            </div>
          </div>
        </div>

      </div>

    </section>
    <!-- END slider -->


    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-5 element-animate">
          @if (Session::has('fash_message'))
           <div class="alert alert-success">{{Session::get('fash_message')}}</div>
          @endif
            <form action="{{url('contactStore')}}" method="post">
            {{csrf_field()}}
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="fname">Nom</label>
                  <input type="text" class="form-control form-control-lg" id="fname" name="family_name">
                 
                  @if($errors->has('family_name'))
                   <small class="form-text invalid-feedback">
                   {{$errors->first('family_name')}}</small>
                  @endif
                </div>
                <div class="col-md-6 form-group">
                  <label for="lname">Prénom</label>
                  <input type="text" class="form-control form-control-lg" id="lname" name="first_name">
                   @if($errors->has('first_name'))
                   <small class="form-text invalid-feedback">{{$errors->first('first_name')}}</small>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" class="form-control form-control-lg" name="email">
                   @if($errors->has('email'))
                   <small class="form-text invalid-feedback">
                   {{$errors->first('email')}}</small>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="message">Ecrire un Message</label>
                  <textarea name="message" id="message" class="form-control form-control-lg" cols="30" rows="8" name="message"></textarea>
                   @if($errors->has('message'))
                   <small class="form-text invalid-feedback">
                   {{$errors->first('message')}}</small>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="Envoyer" class="btn btn-primary btn-lg btn-block">
                </div>

              </div>
            </form>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5 element-animate">
            
            <h5 class="text-uppercase mb-3">Adresse</h5>
            <p class="mb-5">{{$adress->adress}}</p>
            
         

<div class="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d104653.5356291289!2d-1.5295661862655159!3d34.94600554954153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s22%2C+Rue+Abi+Ayad+Abdelkrim+Fg+Pasteur+!5e0!3m2!1sen!2sus!4v1541982988606" width="400" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

          </div>
        </div>
      </div>
    </section>
<!--****************************************************************-->



 <section class="cover_1" style="background-image: url('{{asset('frontEnd')}}/img/ctc.jpg');">
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
            <p class="mb-5">{{$adress->adress}}</p>
            <h4 class="text-uppercase mb-3 h6 text-white">Téléphone</h5>
            <p> {{$adress->numTel}}</p>
            <h4 class="text-uppercase mb-3 h6 text-white">Fax</h5>
            <p class="mb-5"><a href="mailto:info@yourdomain.com">{{$adress->fax}}</a></p>
           
            

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
    

    <script src="{{asset('frontEnd')}}/js/jquery-3.2.1.min.js"></script>
    <script src="{{asset('frontEnd')}}/js/popper.min.js"></script>
    <script src="{{asset('frontEnd')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('frontEnd')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('frontEnd')}}/js/bootstrap-datepicker.js"></script>
    <script src="{{asset('frontEnd')}}/js/jquery.timepicker.min.js"></script>
    <script src="{{asset('frontEnd')}}/js/jquery.waypoints.min.js"></script>
    <script src="{{asset('frontEnd')}}/js/main.js"></script>
