@extends('layouts.master2')
@Section('content')
<style type="text/css">
  #imgProjet{
    height:auto ;
    width: 350px;
  }
</style>
    <section class="home-slider inner-page owl-carousel">
      <div class="slider-item" style="background-image: url('{{asset('frontEnd')}}/img/img2.jpg');">
        <div class="container">
          <div class="row slider-text align-items-center">
            <div class="col-md-7 col-sm-12 element-animate">
              <h1>Liste des projets</h1>
             
            </div>
          </div>
        
        
      </div>

    </section>

    
 <section class="section bg-light">
      <div class="container">
        <div class="row">
          @foreach($allProjets as $allProjet)
            <a href="{{ url('projet/'.$allProjet->id)}}">
          <div class="col-md-4 element-animate">
            <div class="media d-block media-custom text-left">
              <img src="{{asset($allProjet->photoProjet)}}" alt="Image Placeholder" class="img-fluid"  id="imgProjet" 
             >
              <div class="media-body">
                <span class="meta-post">{{$allProjet->type}}</span>
                <h3 class="mt-0 text-black">
                <a href="{{$allProjet->lien}}" class="text-black">
                {{$allProjet->intitule}}</a>
                </h3>
                
                
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
   

   