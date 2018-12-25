@extends('layouts.master2')
@Section('content')
     <style>
#photo {
    border-radius: 50%;
    width: 300px;height: 300px;
    }
    ul.a {
    list-style-type: square;
}
</style>
    <section class="home-slider inner-page owl-carousel">
      <div class="slider-item" style="background-image: url('{{asset('frontEnd')}}/img/membreFoto.jpg');">
      </div>

    </section>

<?php
/*
 <section class="section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4">Nos membres
            </h2>
            <p class="mb-0 lead">Des chercheurs de haut niveau qui recherchent, expérimentent et font progresser leurs discipline : mathématiques, physique, chimie, biologie, médecine, mais aussi psychologie, histoire, sociologie, ethnologie…</p>
          </div>
        </div>
        <div class="row element-animate">
          <div class="major-caousel js-carousel-1 owl-carousel">
           
            @foreach($membres as $membre)
            <div>
            <a href="{{ url('info_membre/'.$membre->id.'/id/'.$membre->equipe_id)}}">
              <div class="media d-block media-custom text-center">
                <img src="{{asset($membre->photo)}}" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">
                  {{$membre->grade}}. {{$membre->name}} {{$membre->prenom}}</h3>
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
             @endforeach

            
            
            
         
          </div>
          <!-- END slider -->
        </div>
      </div>
    </section>


*/?>





 
<section class="section bg-light">
      <div class="container">
      <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4">Nos membres
            </h2>
            <p class="mb-0 lead">Des chercheurs de haut niveau qui recherchent, expérimentent et font progresser leurs discipline : mathématiques, physique, chimie, biologie, médecine, mais aussi psychologie, histoire, sociologie, ethnologie…</p>
          </div>
        </div>
        <div class="row">
         
         
             <?php
             
              foreach ($membres as $membre) {
                ?>  
          <div class="col-md-4 element-animate" >
              <a href="{{ url('info_membre/'.$membre->id.'/id/'.$membre->equipe_id)}}">                    
              <img src="{{asset($membre->photo)}}" alt="Image" style="height: 200px width:200px; Placeholder" title="{{$membre->name}} {{$membre->prenom}}" class="img-thumbnail img-responsive img-circle" id="photo" 
              >
          </div>

             <?php } ?> 
<br><br><br><br><br><br><br><br>
         

        </div>
      </div>
    </section>







    @endsection


@section('footer')


@endsection
@section('script')


@endsection
   

   
    