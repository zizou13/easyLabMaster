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
<!--select * from users,equipes,theses WHERE equipes.id=users.equipe_id and theses.user_id=users.id and users.id=22 -->                    
                      <h2 >Les informations concernant:</h2>
                      <hr size="s" width="100%"  align = "LEFT " color = "#666666" noshade >
                      <br>
                      <table class="table">
                        <?php
               /* $mumber = DB::table('users')

                ->join('equipes', 'equipes.id', '=', 'users.equipe_id')
                ->join('theses', 'theses.user_id', '=', 'users.id')
                 
                ->where('users.id', '=',$id_membre)
                ->get();*/
                
      try
{

        $bdd = new PDO('mysql:host=localhost;dbname=lrit;charset=utf8', 'root', '');

        }
        catch(Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }  
    $req="SELECT * from users,equipes WHERE equipes.id=users.equipe_id and users.id=$id_membre " ;
    $reponse = $bdd->prepare($req); 
    $reponse->execute();
     $row=$reponse->fetch();
     
                  
                     // echo $id_membre. '<br>';

               ?>  
                         <tr>
                            <th>NOM: </td><td>
                            <?php echo $row['name']; ?></td>
                         </tr>
                         <tr>
                            <th>PRENOM:  </td>
                            <td><?php echo $row['prenom']; ?></td>
                         </tr>
                         <tr>
                            <th>GRADE: </td>
                            <td><?php echo $row['grade']; ?></td>
                         </tr>
                         <tr>
                            <th>EMAIL: </td>
                            <td><?php echo $row['email']; ?></td>
                         </tr>
                         <tr>
                            <th>MENBRE DANS L'EQUIPE: </td>

                            <td><?php echo $row['intitule']; ?></td>
                         </tr>
<?php
 $req2="SELECT * from theses WHERE  users.id=$id_membre " ;
    $reponse2 = $bdd->prepare($req2); 
    $reponse2->execute();
     $row2=$reponse2->fetch();
     
                  
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
                            <button type="button" 
                             onclick="self.location.href='{{url('membre')}}'" class="btn btn-primary " id="btQuitter"> 
                                   QUITTER 
                            </button>
                           </td>
                         </tr>
                        
                      </table>
                        
                    </div>
                    <div class="col-lg-5">
                         <img  class="logo" src="<?php 
                         echo (asset($row['photo'])); ?> "
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
          <div class="col-md-4 element-animate">
            <div class="media d-block media-custom text-left">
              <img src="{{asset('frontEnd')}}/img/imM/projet21.jpg" alt="Image Placeholder" class="img-fluid" onclick="self.location.href='projet.html'">
              <div class="media-body">
                <span class="meta-post">22 février 2012</span>
                <h3 class="mt-0 text-black"><a href="#" class="text-black">Radio cognitive</a></h3>
                
                
              </div>
            </div>
          </div>

          <div class="col-md-4 element-animate">
            <div class="media d-block media-custom text-left">
              <img src="{{asset('frontEnd')}}/img/imM/projet21.jpg" alt="Image Placeholder" class="img-fluid">
              <div class="media-body">
                <span class="meta-post">22 février 2012</span>
                <h3 class="mt-0 text-black"><a href="#" class="text-black">Radio cognitive</a></h3>
                
                
              </div>
            </div>
          </div>

          <div class="col-md-4 element-animate">
            <div class="media d-block media-custom text-left">
              <img src="{{asset('frontEnd')}}/img/imM/projet21.jpg" alt="Image Placeholder" class="img-fluid">
              <div class="media-body">
                <span class="meta-post">22 février 2012</span>
                <h3 class="mt-0 text-black"><a href="#" class="text-black">Radio cognitive</a></h3>
                
                
              </div>
            </div>
          </div>


        </div>

        
      </div>
    </section>
    
    <section class="section bg-light">
      <div class="container">
        <div class="row">
        <!--la description de l'équipe -->
        <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4">LA LISTE DES PUBLICATIONS</h2>
            
            <p class="mb-0 lead">*****</p>
          </div>
        </div>
       
      </div>
         <table id="customers">
                     <tr>
                          <th>L'ANNEE</th>
                          <th>PUBLICATION</th>
                          <th>NOMS</th>
                          
                      </tr>
                      <?php
                
                   $publications = DB::table('article_user')
                ->join('users', 'users.id', '=', 'article_user.user_id')

                ->join('articles', 'articles.id', '=', 'article_user.article_id')
                ->select('*', DB::raw('article_user.article_id as id_pub'))
                ->where('users.equipe_id', '=',$id_equipe)
                ->where('users.id', '=',$id_membre)
                ->orderBy('annee', 'desc')
                  ->get();
                 

                  foreach($publications as $publication) {
                      ?>

                
                      <tr> 
                        <td>{{$publication->annee}}</td>
                        <td>{{$publication->titre}}</td>
                        <td>
                           <?php
                
                   $membrePublications = DB::table('article_user')
                ->join('users', 'users.id', '=', 'article_user.user_id')
               ->where('article_user.article_id', '=',$publication->id_pub)
                //->where('users.id', '=',$id_membre)
               
                  ->get();
                 

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
   

   
    