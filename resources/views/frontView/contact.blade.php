@extends('layouts.master2')
@Section('content')
    <!-- END header -->
    
    <section class="home-slider inner-page owl-carousel">
      <div class="slider-item" style="background-image: url('{{asset('frontEnd')}}/img/slider-2.jpg');">
        
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
            <form action="#" method="post">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="fname">Nom</label>
                  <input type="text" class="form-control form-control-lg" id="fname">
                </div>
                <div class="col-md-6 form-group">
                  <label for="lname">Prénom</label>
                  <input type="text" class="form-control form-control-lg" id="lname">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" class="form-control form-control-lg">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="message">Ecrire un Message</label>
                  <textarea name="message" id="message" class="form-control form-control-lg" cols="30" rows="8"></textarea>
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
            <p class="mb-5">22, Rue Abi Ayad Abdelkrim Fg Pasteur  <br> B.P 119 <br> 13000, Tlemcen, Algérie</p>
            
         

<div class="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d104653.5356291289!2d-1.5295661862655159!3d34.94600554954153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s22%2C+Rue+Abi+Ayad+Abdelkrim+Fg+Pasteur+!5e0!3m2!1sen!2sus!4v1541982988606" width="400" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

          </div>
        </div>
      </div>
    </section>

      @endsection


@section('footer')


@endsection
@section('script')


@endsection
