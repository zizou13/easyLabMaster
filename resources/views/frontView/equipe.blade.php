@extends('layouts.master2')
@Section('content')
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
                  <img src="{{asset($equipe->photoEquipe)}}" alt="Image Placeholder" class="img-fluid" style="height: 200px ;">
                  <div class="media-body">
            <!--h3 class="mt-0 text-black">Equipe {{ ++$i }}: </h3-->
            <h3 class="mt-0 text-black">Equipe {{ $equipe->id }}: </h3>
                    <p>{{$equipe->intitule}}</p>
                    <a href="{{ url('services/'.$equipe->id)}}" class="btn-more">Plus</a>
                  </div>
              </div>
            </div>
           
           @endforeach

         
        </div>
      </div>
    </section>
    @endsection


@section('footer')


@endsection
@section('script')


@endsection