@extends('layouts.master2')

@Section('lien')
<link rel="stylesheet" href="{{asset('frontEnd')}}/css/style2.css">
 
 <link href="{{asset('frontEnd')}}/css/bootstrap.min.css" rel="stylesheet">
@endsection
@Section('content')
<style type="text/css">
    body{
      background-image: url('{{asset('frontEnd')}}/img/bak.jpeg');
    }
   

  </style>
 <div class="content-wrapper" >
        <div class="container">
              <div class="row" id="cont">
                    <div class="col-lg-7" >
                   
                      <h2 >Les informations concernant:</h2>
                      <hr size="s" width="100%"  align = "LEFT " color = "#666666" noshade >
                      <br>
                      <table class="table">
                        

                
                         <tr>
                            <th>NOM: </td><td>
                           
                              {{$mumber->name}}
                            </td>
                         </tr>
                         <tr>
                            <th>PRENOM:  </td>
                            <td> {{$mumber->prenom}}</td>
                         </tr>
                         <tr>
                            <th>GRADE: </td>
                            <td> {{$mumber->grade}}</td>
                         </tr>
                         <tr>
                            <th>EMAIL: </td>
                            <td> {{$mumber->email}}</td>
                         </tr>
                         <tr>
                            <th>MEMBRE DANS L'EQUIPE: </td>

                            <td> {{$equipe->intitule}}</td>
                         </tr>


<?php
      try
{

        $bdd = new PDO('mysql:host=localhost;dbname=lrit;charset=utf8', 'root', '');

        }
        catch(Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
 $req2="SELECT * from theses WHERE  user_id=$id_membre " ;
    $reponse2 = $bdd->prepare($req2); 
    $reponse2->execute();
     $row2=$reponse2->fetch();
     
                  //select * from projets,users,projet_user where projet_user.user_id=users.id and projet_user.projet_id=projets.id and users.equipe_id=2
                     // echo $id_membre. '<br>';

               ?>


                          <tr>
                                       <th>SUJET DU THESE: </td>
                                       <td><?php echo $row2['titre']; ?></td>
                         </tr>
                         <tr> 
                             <table width="90%" class="table">

                                     <tr>
                                       <th>&ensp;DELAIS: </td>
                                       <td><?php echo $row2['date_debut']; ?>-<?php echo $row2['date_soutenance']; ?></td>
                                     </tr>
                                     <tr>
                                        <th>&ensp;L'ENCADREURS INITIAL: </td>
                                        <td>
                                        <?php echo $row2['encadreur_int']; ?>
                                        </td>
                                     </tr>
                                     <tr>
                                        <th>&ensp;LE COENCACADREUR INITAIL : </td>
                                        <td>
                                         <?php echo $row2['coencadreur_int']; ?>
                                        </td>
                                     </tr>
                                     <tr>
                                        <th>&ensp;L'ENCADREUR EXTERIEUR: </td>
                                        <td>
                                        <?php echo $row2['encadreur_ext']; ?>
                                        </td>
                                     </tr>
                                      <tr>
                                        <th>&ensp;LE COENCACADREUR ETERIEUR : </td>
                                        <td>
                                         <?php echo $row2['coencadreur_ext']; ?>
                                        </td>
                                     </tr>
                              </table>
                         </tr>

                         <br>
                          
                         <tr>
                            <td> 
                            <a href="{{url('services/'.$id_equipe)}}" class="btn btn-primary " id="btQuitter"> 
                            
                                   QUITTER 
                            </a>
                           </td>
                         </tr>
                        
                      </table>
                        
                    </div>
                    <div class="col-lg-5">
                         <img  class="logo"  src="{{asset($mumber->photo)}}"
                         class="img-circle" id="images_petit" >
                    </div>
              </div>
        </div>
        
                         
     
    <section class="section bg-light">
      <div class="container">
        <div class="row">
        <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4">LA LISTE DES PROJETS</h2>
            <p class="mb-0 lead">Un projet de recherche est un procédé scientifique visant à obtenir des informations et à formuler des hypothèses sur un phénomène social ou scientifique </p>
          </div>
        </div>
                     @foreach($projets as $projet)
          <a href="{{ url('projet/'.$projet->id)}}">
          <div class="col-md-4 element-animate">
            <div class="media d-block media-custom text-left">
              <img src="{{asset('frontEnd')}}/img/imM/projet21.jpg" alt="Image Placeholder" class="img-fluid" >
              <div class="media-body">
                <span class="meta-post">{{$projet->type}}</span>
                <h3 class="mt-0 text-black"><a href="#" class="text-black">
                   {{$projet->intitule}}</a></h3>
                
                
              </div>
            </div>
          </div>
                           @endforeach
          
      </div>

        
      </div>
    </section>
  <!--/**************************************************************************/-->  
    <section class="section bg-light">
      <div class="container">
        <div class="row">
        <!--la description de l'équipe -->
        <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4">LA LISTE DES PUBLICATIONS</h2>
            
            <!--p class="mb-0 lead">*****</p-->
          </div>
        </div>
       
      </div>
         <table id="customers">
                     <tr>
                          <th>L'ANNEE</th>
                          <th>PUBLICATION</th>
                         <th>TYPE</th>
                          <th>RESUME</th>
                          <th>NOMS</th>
                          
                      </tr>
                      <?php
                
                  
                 

                  foreach($publications as $publication) {
                      ?>

                
                      <tr> 
                        <td>{{$publication->annee}}</td>
                        <td>{{$publication->titre}}</td>
                        <td>{{$publication->type}}</td>
                         <td>{{$publication->resume}}</td>
                        <td>
                           <?php
                
                 

                  foreach($membrePublications as $membrePublication) {
                    
                      ?>
                          <li>{{$membrePublication->name}} {{$membrePublication->prenom}}</li>
                         <?php } ?>
                        </td>
                        
                   
                       </tr>
                        
                        <?php } ?>
       </table>



      </div></div>
    </section>
     
     
    </body>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
      
     @endsection


@section('footer')


@endsection
@section('script')


@endsection
   

   
    