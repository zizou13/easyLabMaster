
    @extends('layouts.master2')
@Section('content')
<!--code js-->
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
                <p class="lead">
                {{$labo->text}}
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
            <img src="{{asset($labo->photoLabo)}}" class="img-fluid mb-4" alt="Image placeholder" style="width: 1000px;height: 800px">
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5 element-animate">
            <h2 class="text-uppercase mb-4">Presentation de notre laboratoire</h2>
            <p class="lead">{{$labo->text}}
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
           
           @foreach($equi as $equipe)
              
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
<!--div-->
   @endsection


@section('footer')


@endsection
@section('script')


@endsection
