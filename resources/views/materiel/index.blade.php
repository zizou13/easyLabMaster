@extends('layouts.master')

@section('title','LRI | Liste des matériels')

@section('header_page')

      <h1>
       Matériels
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{url('materiels')}}">Matériels</a></li>
      </ol>

@endsection

@section('asidebar')

        <li >
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

         <li>
          <a href="{{url('equipes')}}">
            <i class="fa fa-group"></i> 
            <span>Equipes</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Membres</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li ><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>

         <li>
          <a href="{{url('theses')}}">
            <i class="fa fa-file-pdf-o"></i> 
            <span>Thèses</span>
          </a>
        </li>

         <li>
          <a href="{{url('articles')}}">
            <i class="fa fa-newspaper-o"></i> 
            <span>Articles</span></a>
          </li>

       
        <li>
          <a href="{{url('projets')}}">
            <i class="fa fa-folder-open-o"></i> 
            <span>Projets</span>
          </a>
        </li>
        @if(Auth::user()->role->nom == 'admin' )

        <li class=" active">
          <a href="{{url('materiels')}}">
            <i class="fa fa-desktop"></i> 
            <span>Matériels</span>
          </a>
        </li>

        
          <li>
          <a href="{{url('parametre')}}">
            <i class="fa fa-gears"></i> 
            <span>Paramètres</span></a>
          </li>
          @endif

       @endsection

@section('content')
     
    <div class="row">
      <div class="col-md-12">
        <div class="box col-xs-12">
          <div class="container" style="padding-top: 30px">
          <div class="row" style="padding-bottom: 20px">
            <div class="box-header col-xs-9">
              <h3 class="box-title">Liste des matériels</h3>
            </div>
          </div>
          </div>
            
            <!-- /.box-header -->
            <div class="box-body">
               @if(Auth::user()->role->nom != 'membre' )
              <div class=" pull-right">
                <a href="{{url('materiels/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"></i> Nouveau Matériel</a>
              </div>
             @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>Catégorie</th>
                  <th>Description</th>
                  <th>Affecter à User</th>
                  <th>Date Emprunte</th>
                  <th>Date Retour</th>
                  <th>Affecter à Equipe</th>
                  <th>Date Emprunte</th>
                  <th>Date Retour</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  @foreach($materiels as $materiel)
                  <tr>
                    <td>{{ $materiel->nom }}</td>
                    <?php
 try
{
        $id=$materiel->id;
        $bdd = new PDO('mysql:host=localhost;dbname=lrit;charset=utf8', 'root', '');

        }
        catch(Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
 $req2="SELECT libelle from categorie_materials,materiels WHERE 
 categorie_materials.id=materiels.cat_mat_id AND materiels.id=$id " ;
    $reponse2 = $bdd->prepare($req2); 
    $reponse2->execute();
    $row=$reponse2->fetch();

                    ?>
                    <td><?php echo $row['libelle'] ?></td>
                    <td>{{ $materiel->description  }}</td>
                    
      <!--**************DATE************************-->              
                     <?php

   $id=$materiel->id;
  $req="SELECT distinct(user_id) from materiel_users WHERE 
      materiel_id=$id " ;
    $reponse = $bdd->prepare($req); 
    $reponse->execute();
    
                    ?>

   <td>            <?php 
                        while($row=$reponse->fetch()){
                            $ii= $row['user_id'];
                            $req2="SELECT  name,prenom from users WHERE
                            users.id= $ii" ;
                            $reponse2 = $bdd->prepare($req2); 
                            $reponse2->execute();
                            $row2=$reponse2->fetch();

                             //
                            
                        ?>
               <li>
                   <?php echo $row2['name']." ". $row2['prenom']."<br>";
                   ?>
                   
               </li>
                 <hr>
                  <?php  }
                    ?> 



   </td>
                  <!--dateEmprunter-->    
                        
    <td>             <?php 
$id=$materiel->id;
  $req="SELECT distinct(user_id) from materiel_users WHERE 
      materiel_id=$id " ;
    $reponse = $bdd->prepare($req); 
    $reponse->execute();
                          while($row=$reponse->fetch()){
                            $iii= $row['user_id'];
                            $req22="SELECT  date_emprunter from users,materiel_users WHERE users.id=materiel_users.user_id AND 
                              users.id=$iii AND materiel_id=$id";
                            $reponse22 = $bdd->prepare($req22); 
                            $reponse22->execute();
                           






                      while($row22=$reponse22->fetch()) { ?>
                        <li><?php
              echo $row22['date_emprunter'] ?>

                         </li>
                          

                                                <?php }?> <hr>

                                               <?php }?>
                
   </td>
                                
                   <td>
                   <?php 

$id=$materiel->id;
  $req="SELECT distinct(user_id) from materiel_users WHERE 
      materiel_id=$id " ;
    $reponse = $bdd->prepare($req); 
    $reponse->execute();
                          while($row=$reponse->fetch()){
                            $i= $row['user_id'];
                            $req33="SELECT  materiel_users.updated_at from users,materiel_users WHERE users.id=materiel_users.user_id AND 
                              users.id=$i AND materiel_id=$id";
                            $reponse33 = $bdd->prepare($req33); 
                            $reponse33->execute();
                           
                       while($row33=$reponse33->fetch()) { ?>

                        <li><?php
                            echo $row33['updated_at'] ?>
                         </li> 
                         <?php }?> 
                         <hr>

                                               <?php }?>
                
   </td>

                         

                   

   <!-- /******************Equipe**************************/-->
                    <?php

   $id=$materiel->id;
  $reql="SELECT distinct(equipe_id) from materiel_equipes WHERE 
      materiel_id=$id " ;
    $reponsel = $bdd->prepare($reql); 
    $reponsel->execute();
    
                    ?>

   <td>            <?php 
                        while($rowl=$reponsel->fetch()){
                            $a= $rowl['equipe_id'];
                            $reqm="SELECT  intitule from equipes WHERE
                            equipes.id= $a" ;
                            $reponsem = $bdd->prepare($reqm); 
                            $reponsem->execute();
                            $rowm=$reponsem->fetch();

                             //
                            
                        ?>
               <li>
                   <?php echo $rowm['intitule'];
                   ?>
                   <br>
               </li>
                 <hr>
                  <?php  }
                    ?> 



   </td>
             <!--dateEmprunter d'equipe-->    
                        
    <td>             <?php 
$id=$materiel->id;
  $req5a="SELECT distinct(equipe_id) from materiel_equipes WHERE 
      materiel_id=$id " ;
    $reponse5a = $bdd->prepare($req5a); 
    $reponse5a->execute();
                          while($row5a=$reponse5a->fetch()){
                            $a2= $row5a['equipe_id'];
                            $req27="SELECT  date_emprunter from equipes,materiel_equipes WHERE equipes.id=materiel_equipes.equipe_id AND 
                              equipes.id=$a2 AND materiel_id=$id";
                            $reponse27 = $bdd->prepare($req27); 
                            $reponse27->execute();
                           






                      while($row27=$reponse27->fetch()) { ?>
                        <li><?php
              echo $row27['date_emprunter'] ?>

                         </li>
                          

                                                <?php }?> <hr>

                                               <?php }?>
                
   </td>
                                
                   <td>
                   <?php 

$id=$materiel->id;
  $req5b="SELECT distinct(equipe_id) from materiel_equipes WHERE 
      materiel_id=$id " ;
    $reponse5b = $bdd->prepare($req5b); 
    $reponse5b->execute();
                          while($row5b=$reponse5b->fetch()){
                            $a3= $row5b['equipe_id'];
                            $req28="SELECT  materiel_equipes.updated_at from equipes,materiel_equipes WHERE equipes.id=materiel_equipes.equipe_id AND 
                              equipes.id=$a3 AND materiel_id=$id";
                            $reponse28 = $bdd->prepare($req28); 
                            $reponse28->execute();
                           
                       while($row28=$reponse28->fetch()) { ?>

                        <li><?php
                            echo $row28['updated_at'] ?>
                         </li> 
                         <?php }?> 
                         <hr>

                                               <?php }?>
                
   </td>

                    




                      <!-- /****************/-->
                    <td>
                     <form action="{{ url('materiels/'.$materiel->id)}}" method="post"> 

                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                      <a href="{{ url('materiels/'.$materiel->id.'/details')}} " class="btn btn-info">
                        <i class="fa fa-eye"></i>
                      </a>
                      @if(Auth::user()->role->nom != 'membre' )
                      <a href="{{ url('materiels/'.$materiel->id.'/edit')}}" class="btn btn-default">
                        <i class="fa fa-edit"></i>
                      </a>
                      @endif
                      @if(Auth::user()->role->nom != 'membre' )
                      <!-- <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i>
                      </button> -->
                       <a href="#supprimer{{ $materiel->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $materiel->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $materiel->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ? 
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('materielss/'.$materiel->id)}}"  method="POST">
                                          @method('DELETE')
                                          @csrf
                                      <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                          <button type="submit" class="btn btn-danger">Oui</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>


                      @endif
                      </form>
                    </div>
                    </td>
                  </tr>
                  @endforeach

                  


                </tbody>
                <tfoot>
                 <tr>
                 <th>Nom</th>
                  <th>Catégorie</th>
                  <th>Description</th>
                  <th>Affecter à User</th>
                  <th>Date Emprunte</th>
                  <th>Date Retour</th>
                  
                  <th>Affecter à Equipe</th>
                  <th>Date Emprunte</th>
                  <th>Date Retour</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        
      </div>
      
    </div>
    
  @endsection