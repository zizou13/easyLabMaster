 @extends('layouts.master2')
@Section('content')

<?php
try
{

        $bdd = new PDO('mysql:host=localhost;dbname=lrit;charset=utf8', 'root', '');

        }
        catch(Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }


      ?>
    <section class="home-slider inner-page owl-carousel">
      <div class="slider-item" style="background-image: url('{{asset('frontEnd')}}/img/newact.jpeg');">

      </div>

    </section>
    <!-- END slider -->
    
    <section class="section">
      <div class="container">
        <div class="row justify-content-center element-animate">
          <div class="col-md-6">

            <!--form action="{{ url('/recherche')}}" method="post"> 
             {{ csrf_field() }}
              <div class="input-group input-group-lg">
                <input type="text" id="search-doctor" class="form-control" placeholder="Rechercher..." aria-label="Rechercher...">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">Go!</button>
                   <button type="submit" name="search" class="btn btn-primary">
                </button>
                </span>
              </div>
            </form-->
            <form action="/rechercheActualite" method="POST" class="sidebar-form" role="search">
      {{ csrf_field() }}
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
          </div>
        </div>
      </div>
    </section>
    <section class="section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4">Actualités</h2>
            </div>
        </div></div>
      <section class="section bg-light">
        <div class="container">
          <div class="row">
                   @foreach($actualites as $actualite)
                   <a href="{{ url('actuality/'.$actualite->id)}}">
            <div class="col-md-4 element-animate">
              <div class="media d-block media-custom text-center">
               <img src="{{asset($actualite->photoA)}}" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
          <?php      
           $id=$actualite->id;
          $req2="SELECT name,prenom from users,actualites WHERE 
           users.id= actualites.user_id AND actualites.id=$id " ;
    $reponse2 = $bdd->prepare($req2); 
    $reponse2->execute();
     $row2=$reponse2->fetch();
     ?>           
                
                  <h3 class="mt-0 text-black">{{$actualite->titre}}</h3>
       <p  style="color:gray">Publier par: <?php echo $row2['name']    ?>
                  <?php echo $row2['prenom']    ?>
       </p>
                   <a href="{{ url('actuality/'.$actualite->id)}}" class="btn-more">Savoir plus</a>
                </div>
              </div>
            </div>
            @endforeach
            </div></div></section>


            













        

      </div>
    </section>

    

     @endsection


@section('footer')


@endsection
@section('script')


@endsection