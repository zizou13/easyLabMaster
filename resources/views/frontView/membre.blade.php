@extends('layouts.master2')
@Section('content')
    
    <section class="home-slider inner-page owl-carousel">
      <div class="slider-item" style="background-image: url('{{asset('frontEnd')}}/img/membreFoto.jpg');">
      </div>

    </section>
 <section class="section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4">Nos me=mbres
            </h2>
            <p class="mb-0 lead">Des chercheurs de haut niveau qui recherchent, expérimentent et font progresser leurs discipline : mathématiques, physique, chimie, biologie, médecine, mais aussi psychologie, histoire, sociologie, ethnologie…</p>
          </div>
        </div>
        <div class="row element-animate">
          <div class="major-caousel js-carousel-1 owl-carousel">
            <div>
              <div class="media d-block media-custom text-center">
                <img src="{{asset('frontEnd')}}/img/doctor_1.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Azedine CHIKH</h3>
                  <p>Docteur en Informatique.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                    <a href="#" class="btn-more"><br>Savoir plus</a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="{{asset('frontEnd')}}/img/doctor_2.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Mohammed MESSABIHI</h3>
                  <p>Professeur (associé).</p>
                  <p>
                    <a href="https://www.facebook.com/mohamed.messabihi.90" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="https://twitter.com/mohamed055715" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="https://fr.linkedin.com/in/mohamed-messabihi-5b831817" class="p-2"><span class="fa fa-linkedin"></span></a>
                     <a href="#" class="btn-more"><br>Savoir plus</a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="{{asset('frontEnd')}}/img/doctor_3.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">MCB. Yassmine SELAADJI</h3>
                  <p>Maitre de conference type B.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                    <a href="{{url('info_membre')}}" class="btn-more"><br>Savoir plus</a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="{{asset('frontEnd')}}/img/doctor_4.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Houcine MATALLAH</h3>
                  <p>Directeur de recherche.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                    <a href="#" class="btn-more"><br>Savoir plus</a>
                  </p>
                </div>
              </div>
            </div>

            <div>
              <div class="media d-block media-custom text-center">
                <img src="{{asset('frontEnd')}}/img/doctor_1.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Azedine CHIKH</h3>
                    <p>Docteur en Informatique.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                    <a href="#" class="btn-more"><br>Savoir plus</a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="{{asset('frontEnd')}}/img/doctor_2.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Mohammed MESSABIHI</h3>
                  <p>Professeur (associé).</p>
                  <p>
                     <a href="https://www.facebook.com/mohamed.messabihi.90" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="https://twitter.com/mohamed055715" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="https://fr.linkedin.com/in/mohamed-messabihi-5b831817" class="p-2"><span class="fa fa-linkedin"></span></a>
                    <a href="#" class="btn-more"><br>Savoir plus</a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="{{asset('frontEnd')}}/img/doctor_3.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">MCB. Yassmine SELAADJI</h3>
                  <p>Maitre de conference type B.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                    <a href="{{url('info_membre')}}" class="btn-more"><br>Savoir plus</a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="{{asset('frontEnd')}}/img/doctor_4.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Houcine MATALLAH</h3>
                  <p>Directeur de recherche.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                    <a href="#" class="btn-more"><br>Savoir plus</a>
                  </p>
                </div>
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
   

   
    