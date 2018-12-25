
    @extends('layouts.master2')
@Section('content')
    <section class="home-slider inner-page owl-carousel">
      <div class="slider-item" style="background-image: url('{{asset('frontEnd')}}/img/img1.jpg');">
        
        <div class="container">
          <div class="row slider-text align-items-center">
            <div class="col-md-7 col-sm-12 element-animate">
              <h1>Presentation de notre laboratoire</h1>
             
            </div>
          </div>
        </div>

      </div>

    </section>
    <!-- END slider -->


   <section class="section bg-light custom-tabs">
      <div class="container">
        <div class="row">

          <div class="col-md-4 border-right element-animate" data-animate-effect="fadeInLeft">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="{{url('about')}} role="tab" aria-controls="v-pills-home" aria-selected="true"><span>01</span> PRESENTATION</a>
               <a class="nav-link" id="v-pills-messages-tab"  href="{{url('news')}}" role="tab" aria-controls="v-pills-messages" aria-selected="false"><span>02</span> PROJETS</a>
              <a class="nav-link" id="v-pills-settings-tab"  href="{{url('membre')}}" role="tab" aria-controls="v-pills-settings" aria-selected="false"><span>03</span> MEMBRES</a>
           
             
              <a class="nav-link" id="v-pills-settings-tab"  href="{{url('equipe')}}" role="tab" aria-controls="v-pills-settings" aria-selected="false"><span>04</span> EQUIPES</a>
              
              <a class="nav-link" id="v-pills-settings-tab"  href="{{url('contact')}}" role="tab" aria-controls="v-pills-settings" aria-selected="false"><span>05</span> CONTACT</a>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-7 element-animate" data-animate-effect="fadeInLeft">
            
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
               

                <h2 class="text-primary">Présentation</h2>
                <p class="lead">La recherche scientifique constitue un enjeu déterminant au 21éme siècle  eu égard aux défis technologiques et à la mondialisation qui sera le champ de confrontation entre les nations industrialisées et modernes, confrontation qui risque de reléguer au second plan les sociétés qui ne se donnent pas les moyens de se développer.
                Le laboratoire de recherche pour la réalisation d'objectifs de recherche pour le développement, pour la réalisation d'études et pour le travail d'acquisition et pour l'acquisition de connaissances, pour l'acquisition de connaissances, pour la formation et pour la recherche diffusion de l'information scientifique et des résultats obtenus. Dirigé par un directeur élu, il doit être constitué d'au moins quatre équipes de recherche, chacun dirigé par un chercheur qualifié et moins d'au moins trois chercheurs.
              </p>
                
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 element-animate">
            <img src="{{asset('frontEnd')}}/img/img_1.jpg" class="img-fluid mb-4" alt="Image placeholder" style="width: 1000px;height: 1500px">
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5 element-animate">
            <h2 class="text-uppercase mb-4">Presentation de notre laboratoire</h2>
            <p class="lead">
Le LRI, Laboratoire Mixte de Recherche de l'Université de Tlemcen, est un laboratoire de recherche en informatique se consacrant à la modélisation et la résolution de problèmes fondamentaux motivés par les applications, ainsi qu'à la mise en oeuvre et la validation des solutions au travers de partenariats académiques comme le département de Mathématique et de Physique Electronique.
Les axes fédérateurs sont :
Sûreté, sécurité, fiabilité ;
Science des données, intelligence et optimisation ; 
Systèmes communicants.
Le LRI répond à ces challenges à différents niveaux thématiques au sein des 3 départements.
 
Bien que récemment agréé et créé, le LRI est doté déja d'une composante humaine assez riche et multidisciplinaire. Le LRI est composé de 33 chercheurs, 1 ingénieur et 1 secrétaire. Il accueille plus d'une dizaine de doctorants, près d'une trentaine de MA, 4MC et un professeur. La recherche est organisée en quatre équipes regroupées en plusieures thématiques : Systèmes Intelligents, Données et Apprentissage Artificiel, Réseaux et Systèmes,  Modélisation et Optimisation, Web sémantique. 
 
La production scientifique est en moyenne d'une vintaine de publications par an.
 
La coopération internationale est une nécessité pour notre laboratoire Il entretient des relations suivies avec des universités françaises et tunisiennes. En complément de la recherche académique, le LRI a une récente coopération avec le monde industriel et des partenaires socio économiques.
 
Le laboratoire est grandement impliqué dans des enseignements liés à la recherche en master (Master Réseaux, Master Génie Logiciel, Master SIC et MID). L'école doctorale "Réseaux et Services" du département Informatique de l'Université de Tlemcen accueille les doctorants du laboratoire.
</p>
           
          </div>
        </div>
      </div>
    </section>

   
        </div>
      </div>
    <!--/section-->

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
                  <img src="{{asset($equipe->photoEquipe)}}" alt="      Image Placeholder" class="img-fluid" style="height: 200px ;">
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

          
        </div>
      </div>
    </section>

   @endsection


@section('footer')


@endsection
@section('script')


@endsection
