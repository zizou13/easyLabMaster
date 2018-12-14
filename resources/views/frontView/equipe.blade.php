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
            <div>
              <div class="media d-block media-custom text-center">
                <img src="{{asset('frontEnd')}}/img/imgEquipe.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Equipe1: </h3>
                  <p>Equipe Systèmes communicants</p>
                  <a href="services.html" class="btn-more">Plus</a>
                    
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="{{asset('frontEnd')}}/img/equipe1.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Equipe2: </h3>
                  <p>Ingénierie des Logiciels Sûrs</p>
                  <a href="#" class="btn-more">Plus</a>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="{{asset('frontEnd')}}/img/equipe3.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Equipe3: </h3>
                  <p>Systèmes d’information et de connaissance</p>
                  <a href="#" class="btn-more">Plus</a>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="{{asset('frontEnd')}}/img/equipe4.png" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Equipe4: </h3>
                  <p>Reseau,services et systèmes distribués.</p>
                 <a href="#" class="btn-more">Plus</a>
                </div>
              </div>
            </div>

           
          <!-- END slider -->
        </div>
      </div>
    </section>
    @endsection


@section('footer')


@endsection
@section('script')


@endsection