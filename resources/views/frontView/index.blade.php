@extends('layouts.master2')
@Section('content')

    <!-- END header -->
    
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url('{{asset('frontEnd')}}/img/slider-2.jpg');">
        
       
      </div>

      <div class="slider-item" style="background-image: url('{{asset('frontEnd')}}/img/slider-1.jpg');">
        
      
        
        
              
            </div>

          </div>
        </div>

      </div>

    </section>
      </div>

    </section>
    <!-- END slider -->

    
    <section class="container home-feature mb-5">
      <div class="row">
        <div class="col-md-4 p-0 one-col element-animate">
          <div class="col-inner p-xl-5 p-lg-5 p-md-4 p-sm-4 p-4">
            <span class="icon flaticon-hospital-bed"></span>
            <h2>Presentation</h2>
            <p> L’objectif des Laboratoire de recherche (LR) est de rassembler les chercheurs activant dans les mêmes axes de recherches que ceux développés au LR, afin d’échanger des idées et de créer des liens de collaborations inter-laboratoires et de réunir les compétences nationales autour de ces divers thèmes d’actualités.D'autre part, le LR organise périodiquement l'ICSIP qui est une conférence à caractère international.</p>
          </div>
          <a href="about.html" class="btn-more">Read More</a>
        </div>
        <div class="col-md-4 p-0 two-col element-animate">
          <div class="col-inner p-xl-5 p-lg-5 p-md-4 p-sm-4 p-4">
            <span class="icon flaticon-first-aid-kit"></span>
            <h2>Membres</h2>
            <p>Des chercheurs de haut niveau qui recherchent, expérimentent et font progresser leurs discipline : mathématiques, physique, chimie, biologie, médecine, mais aussi psychologie, histoire, sociologie, ethnologie… </p>
          </div>
          <a href="news.html" class="btn-more">Read More</a>
        </div>
        <div class="col-md-4 p-0 three-col element-animate">
          <div class="col-inner p-xl-5 p-lg-5 p-md-4 p-sm-4 p-4">
            <span class="icon flaticon-hospital"></span>
            <h2>Projets</h2>
            <p>Un projet de recherche est un procédé scientifique visant à obtenir des informations et à formuler des hypothèses sur un phénomène social ou scientifique
            </p>
          </div>
          <a href="projet.html" class="btn-more">Read More</a>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="section stretch-section">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4">Bienvenue sur notre Laboratoire de recherche</h2>
            <p class="mb-0 lead">Université ABOU BEKR BELKAID - TLEMCEN <br> Proposé dans le cadre du Programme National de recherche.</p>
          </div>
        </div>
       
      </div>
    </section>
  

    <section class="section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4">Nos equipes </h2>
            <p class="mb-0 lead">
Pour redynamiser les secteurs de la recherche, l'Algérie a promulgué un ensemble de textes réglementaires et notamment la Loi n°98/11 du 22 Août 1998 portant loi d'orientation et de programme à projection quinquennale 1998/2000, établi un plan national de la recherche scientifique (PNR)  et institué un fonds national de la recherche scientifique et du développement technologique (FNR) chargé du financement de la recherche.Notre laboratoire comprend 4 equipes de recherche</p>
          </div>
        </div>
        <div class="row element-animate">
          <div class="major-caousel js-carousel-1 owl-carousel">
          <?php 
            $i=0; 
           ?>
           
           @foreach($equipes as $equipe)
              
            <div>
              <div class="media d-block media-custom text-center">
                  <img src="{{asset('frontEnd')}}/img/equipe1.jpg" alt="      Image Placeholder" class="img-fluid" style="height: 200px ;">
                  <div class="media-body">
            <!--h3 class="mt-0 text-black">Equipe {{ ++$i }}: </h3-->
            <h3 class="mt-0 text-black">Equipe {{ $equipe->id }}: </h3>
                    <p>{{$equipe->intitule}}</p>
                    <a href="{{ url('services/'.$equipe->id)}}" class="btn-more">Plus</a>
                  </div>
              </div>
            </div>
            <!-- @if($i == 3 || $i==9) <br>  
               @endif-->
           @endforeach

          <!--div>
              <div class="media d-block media-custom text-center">
                <img src="{{asset('frontEnd')}}/img/equipe1.jpg" alt="Image Placeholder" class="img-fluid" style="height:200px;">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Equipe2: </h3>
                  <p>Ingénierie des Logiciels Sûrs</p>
                  <a href="#" class="btn-more">Plus</a>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="{{asset('frontEnd')}}/img/equipe3.jpg" alt="Image Placeholder" class="img-fluid" style="height:200px;">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Equipe3: </h3>
                  <p>Systèmes d’information et de connaissance</p>
                  <a href="#" class="btn-more">Plus</a>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="{{asset('frontEnd')}}/img/equipe4.png" alt="Image Placeholder" class="img-fluid" style="height:180px;">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Equipe4: </h3>
                  <p>Reseau,services et systèmes distribués.</p>
                 <a href="#" class="btn-more">Plus</a>
                </div>
              </div>
            </div-->

           
          <!-- END slider -->
        </div>
      </div>
    </section>
    
@endsection


@section('footer')


@endsection
@section('script')


@endsection