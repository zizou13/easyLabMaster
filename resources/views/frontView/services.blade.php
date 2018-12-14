@extends('layouts.master2')
@Section('content')
    <style>
#photo {
    border-radius: 50%;
    }
    ul.a {
    list-style-type: square;
}

</style>
   
    <section class="home-slider inner-page owl-carousel">
      <div class="slider-item" style="background-image: url('{{asset('frontEnd')}}/img/equipe1.jpg');">
      </div>

    </section>
    <section class="section stretch-section">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4">
            {{$equipe-> intitule}}</h2>
           
            <p class="mb-0 lead">{{$equipe->resume}}</p><br>
            <p style="font-size:20px;" >
                     <STRONG >CHEF D'EQUIPE: </STRONG>
                    <a href="{{ url('services/'.$equipe->chef_id.'/details')}}" >
                    {{$equipe->chef->name}} {{$equipe->chef->prenom}}
                    </a>
            </p>
          </div>
        </div>
       
      </div>
    </section>
   <section class="section bg-light custom-tabs">
      <div class="container">
        <div class="row">

          <div class="col-md-4 border-right element-animate" data-animate-effect="fadeInLeft">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" id="v-pills-home-tab" href="about.html" role="tab" aria-controls="v-pills-home" aria-selected="true"><span>01</span> PRESENTATION</a>
              <a class="nav-link" id="v-pills-messages-tab"  href="news.html" role="tab" aria-controls="v-pills-messages" aria-selected="false"><span>02</span> PROJETS</a>
              <a class="nav-link" id="v-pills-profile-tab"  href="doctors.html" role="tab" aria-controls="v-pills-profile" aria-selected="false"><span>03</span> MEMBRES</a>
              <a class="nav-link" id="v-pills-settings-tab"  href="equipe.html" role="tab" aria-controls="v-pills-settings" aria-selected="false"><span>04</span> EQUIPES</a>
              <a class="nav-link" id="v-pills-settings-tab"  href="contact.html" role="tab" aria-controls="v-pills-settings" aria-selected="false"><span>05</span> CONTACT</a>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-7 element-animate" data-animate-effect="fadeInLeft">
            
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
               <h3 class="text-primary">Les membres de l'équipe:</h3>
                <p class="lead"></p>
               
 <section class="section bg-light">
      <div class="container">
        <div class="row">
         
         
             <?php
                
              
                $membres = DB::table('users')
                ->join('equipes', 'equipes.id', '=', 'users.equipe_id')
                ->select('*', DB::raw('users.id as userId'))
                ->where('users.equipe_id', '=',$equipe->id)

                  ->get();

                  foreach ($membres as $membre) {
                     //echo $membre->userId. '<br>';

               ?>  
          <div class="col-md-4 element-animate" >
              <a href="{{ url('info_membre/'.$membre->userId.'/id/'.$equipe->id)}}">                    
              <img src="{{asset($membre->photo)}}" alt="Image" style="height: 200px width:200px; Placeholder" title="{{$membre->name}} {{$membre->prenom}}" class="img-thumbnail img-responsive img-circle" id="photo" 
              >
          </div>

             <?php } ?> 
<br><br><br><br><br><br><br><br>
         

        </div>
      </div>
    </section>
    
   


</div>
                
           <h3 class="text-primary">Les publications de l'équipe:</h3>
                <p class="lead"></p>
               <table id="customers">
                  <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Titre</th>
                    <th>Type</th>
                    <th>Annee</th>
                  </tr>
                  <?php
                
              
                $publications = DB::table('article_user')
                ->join('users', 'users.id', '=', 'article_user.user_id')
                ->join('articles', 'articles.id', '=', 'article_user.article_id')
                ->where('users.equipe_id', '=',$equipe->id)
                ->orderBy('annee', 'desc')
                  ->get();

                  foreach ($publications as $publication) {
                      //echo $membre->name. '<br>';

               ?> 
                  <tr>
                    <td>{{$publication->name}}</td>
                    <td>{{$publication->prenom}}</td>
                    <td>{{$publication->titre}}</td>
                    <td>{{$publication->type}}</td>
                    <td>{{$publication->annee}}</td>
                </tr>
                 <?php  } ?>
                 </table>
                <br><br>
                <!-- les projet  fiha problem de groupby-->
                 <h3 class="text-primary">Les projets de l'équipe:</h3>
                <p class="lead"></p> 
                <table id="customers">
                    <tr>
                      <th>Intitulé</th>
                      <th>Type</th>
                      <th>Partenaires</th>
                      <th>Chef</th>
                      <th>Membres</th>
                      
                    </tr>
                    <?php
                    
                  $projets = DB::table('projets')
                   ->join('users', 'users.id', '=', 'projets.chef_id')
                ->select('*', DB::raw('projets.id as projetId'))
                ->where('users.equipe_id', '=',$equipe->id)
                ->get();

                  foreach ($projets as $projet) {
                      ?>

                    <tr onclick="self.location.href='{{url('projet')}}'">
                      <td>{{$projet->intitule}}</td>
                      <td>{{$projet->type}}</td>
                      <td>{{$projet->partenaires}}</td>
                      <td>{{$equipe->chef->name}}  {{$equipe->chef->prenom}}</td>
                      
                      <td>
                    <ul class="a">
                    
                    <?php
                    $membreProjets = DB::table('projet_user')
                ->join('users', 'users.id', '=', 'projet_user.user_id')
                ->where('projet_user.projet_id', '=',$projet->projetId)
                
                ->get();

                  foreach ($membreProjets as $membreProjet) { ?>

                    
                   <li>
                    {{$membreProjet->name}} {{$membreProjet->prenom}}
                    
                    </li>
                     <?php  } ?>
                  </ul>
                  </td>
                  </tr>
                     <?php  } ?>
                  </table>

















              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    
@endsection


@section('footer')


@endsection
@section('script')


@endsection