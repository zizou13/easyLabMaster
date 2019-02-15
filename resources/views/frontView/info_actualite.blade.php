 @extends('layouts.master2')

    @Section('content')
<br><br><br><br><br>

<style type="text/css">
	#ghie{
font-family: sans-serif ;
color: gray;
font-size: 18px;
font-weight:bold;
	}
</style>
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
<!--style type="text/css">
  body{
    background-color: #A9D0F5;
  }
</style-->
 <div class="container">
    
      <h1 align="center">{{$actualite->titre}}</h1>
       <br> <br>
 <img src="{{asset($actualite->photoA)}}" alt="Nouveau !"  align=right  height="230" width="470" />


  <STRONG id="ghie">{{$actualite->contenu}}</STRONG>
   <?php      
           $id=$actualite->id;
          $req2="SELECT name,prenom from users,actualites WHERE 
           users.id= actualites.user_id AND actualites.id=$id " ;
    $reponse2 = $bdd->prepare($req2); 
    $reponse2->execute();
     $row2=$reponse2->fetch();
     ?>           
       <?php
             $idUser=$actualite->user_id;
           $req3="SELECT equipe_id from users WHERE 
           users.id= $idUser " ;
    $reponse3= $bdd->prepare($req3); 
    $reponse3->execute();
     $row3=$reponse3->fetch();
           $idEquipe=$row3['equipe_id'];
       ?> 

        <p class="sub-heading element-animate mb-5">RECHERCHE PUBLIÉ PAR: <a href="{{ url('info_membre/'.$idUser.'/id/'.$idEquipe)}}">
        <?php echo $row2['name']." ". $row2['prenom'] ;?></a><br>
        <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;-->


         LE: <a>{{$actualite->created_at}}</a> </p>
       
       

     </div>
   <br><br><br><br><br><br><br>

     @endsection


@section('footer')


@endsection
@section('script')


@endsection