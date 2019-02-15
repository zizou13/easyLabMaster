@extends('layouts.master')

@section('title','LRI | Profil')

@section('header_page')

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

	  <h1>
        Profil
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Profil</li>
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
        
        <li class="treeview ">
          <a href="#">
            <i class="fa fa-user"></i> <span>Membres</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
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
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset($materiel->photo)}}" alt="materiel profile picture" style="width:200px;height:200px;  ">

              <h3 class="profile-username text-center">{{$materiel->nom}}</h3>

             
             
            </div>
            <!-- /.box-body -->
          </div>
    
        </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#activity1" data-toggle="tab">A propos</a></li>
              <li class="active"><a href="#activity" data-toggle="tab">Modifier</a></li>
              <li><a href="#timeline" data-toggle="tab">Affect Matériels</a></li>
            </ul>

            <div class="tab-content">
        
              
                     
                          



             <div class="tab-pane" id="timeline">
                 <div class="box-body" style="padding-top: 30px;">
               

               <!--div class="text-center">
                <div class="btn-group"-->

             <div class="row" >

 @if(!$materiel->autorisation_pret)

               


             <div class="col-lg-2 col-lg-offset-1">
              <a href="#affUser" class=" btn btn-lg btn-primary" data-toggle="modal"><i class="fa fa-user"></i> &nbsp;USER</a>
               </div>


               <div class="col-lg-2 col-lg-offset-1" >
              <a href="#affEquipe" role="button" class=" btn btn-lg btn-success" data-toggle="modal"><i class="fa fa-group"></i> &nbsp;EQUIPE</a>
  <!--****************equipe************************************-->
                   <form class="form-inline" method="POST" action="{{url('materielAffectEquipe/'.$materiel->id)}}">
               
              {{ csrf_field() }}

                  <div class="modal fade" id="affEquipe" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <!--change-->
                                  <div class="modal-body text-center">
                                      <!--huibhb-->

                  <div class="form-group " >
                        <label class="col-xs-4 control-label">Affecter à Equipe (*)
                        </label>  
                        <div class="col-xs-8 inputGroupContainer @if($errors->get('equipe_id')) has-error @endif">
                          <div style="width: 70%">
                            <select name="equipeI" class="form-control select2" >
                              
                               @foreach($equipes as $equipe)
                              
                              <option value="{{$equipe->id}}" >
                                   
                              {{$equipe->intitule}}</option>
                               @endforeach
                            </select>

                          </div>
                        </div>
                  </div>  

                  <div class="form-group">
                            <label class="col-xs-4 control-label">Date d'emprunt(*)
                            </label> 
                            <div class="col-xs-8 inputGroupContainer input-group Date" style="width: 50%">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div> 
                              <input name="dateE" type="text" class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="datepicker" value="{{old('dateE')}}">
                            </div>
                      </div>
                                      
                                  </div>
                                  <!--Fin change-->
                                  <div class="modal-footer">
                                      <!--form class="form-inline" method="POST" action="{{url('materielAffectEquipe/'.$materiel->id)}}"-->
                                     <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                      {{ csrf_field() }}
                                          <button type="submit" class="btn btn-danger" name="add">Oui</button>
                                      <!--/form-->

                                  </div>
                              </div>
                          </div>
                      </div>
                      </form>
<!--***********************Fin equipe******************************--> 
<!--************************User***********************************-->
 <form class="form-inline" method="POST" action="{{url('materielAffectUser/'.$materiel->id)}}">
                   {{ csrf_field() }}


                  <div class="modal fade" id="affUser" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <!--change-->
                                  <div class="modal-body text-center">
                                      <!--huibhb-->

                  <div class="form-group " >
                        <label class="col-xs-4 control-label">Affecter à User (*)
                        </label>  
                        <div class="col-xs-8 inputGroupContainer @if($errors->get('user_id')) has-error @endif">
                          <div style="width: 70%">
                            <select name="UserI" class="form-control select2" >
                              
                               @foreach($membres as $membre)
                              
                              <option value="{{$membre->id}}" >
                                   
                              {{$membre->name}}  {{$membre->prenom}}</option>
                               @endforeach
                            </select>

                          </div>
                        </div>
                  </div>  

                 <div class="form-group">
                            <label class="col-xs-4 control-label">Date d'emprunt(*)
                            </label> 
                            <div class="col-xs-8 inputGroupContainer input-group Date" style="width: 50%">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div> 
                              <input name="dateEp" type="text" class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="datepicker" value="{{old('dateEp')}}">
                             
                            </div>
                      </div>
                                     
                                  </div>
                                  
                                  <div class="modal-footer">
                                      <!--form class="form-inline" method="POST" action="{{url('materielAffectUser/'.$materiel->id)}}"-->
                                     <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                      {{ csrf_field() }}
                                          <button type="submit" class="btn btn-danger" name="add">Oui</button>
                                      <!--/form-->

                                  </div>
                              </div>
                          </div>
                      </div>
              </div>
              </form>
                 
 <!--*********************Fin user**********************************--> 

<div class="col-lg-2 col-lg-offset-1">
               <a href="#" class=" btn btn-lg btn-default" disabled="disabled"><i class="fa  fa-mail-reply"></i> &nbsp;DESAFFECT</a>
               </div>
              @endif
               



               
                @if($materiel->autorisation_pret)
                
                <div class="col-lg-2 col-lg-offset-1" >
              <a href="#" role="button" class=" btn btn-lg btn-primary" data-toggle="modal" disabled="disabled"><i class="fa fa-user"></i> &nbsp;USER</a></div>
              <div class="col-lg-2 col-lg-offset-1" >
              <a href="#" role="button" class=" btn btn-lg btn-success" data-toggle="modal" disabled="disabled"><i class="fa fa-group"></i> &nbsp;EQUIPE</a></div>





               <div class="col-lg-2 col-lg-offset-1">
               <a href="#cc" class=" btn btn-lg btn-default" data-toggle="modal"><i class="fa  fa-mail-reply"></i> &nbsp;DESAFFECT</a>
<!--**********************desaffect********************************-->
 <form class="form-inline" action="{{url('materielRetour/'.$materiel->id)}}"  method="POST">
   {{ csrf_field() }}



<div class="modal fade" id="cc" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>

                                  <div class="form-group">
                            <label class="col-xs-4 control-label">Date de retour(*)
                            </label> 
                            <div class="col-xs-8 inputGroupContainer input-group Date" style="width: 50%">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div> 
                              <input name="dateR" type="text" class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="datepicker" value="{{old('dateR')}}">


                            </div>
                      </div>


                                  <div class="modal-footer">
                                      <!--form class="form-inline" action="{{url('materielRetour/'.$materiel->id)}}"  method="POST"-->
                                          
                                          
                                      <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                      {{ csrf_field() }}
                                          <button type="submit" class="btn btn-danger">Oui</button>
                                      <!--/form-->
                                  </div>
                              </div>
                          </div>
                      </div>

  </form>


<!--*****************fin desaffect********************************-->
               </div>

               @endif

                  </div>
                </div>
              </div>
           
             



              <div class="tab-pane" id="activity1">
                <div class="box-body">
                  
                  <div class="row">
                  <div class="col-md-3">
                    <strong>Catégorie:</strong>
                  </div>
                  <div class="col-md-9">
                    
                    <?php
    
        $id=$materiel->id;
 $req2="SELECT libelle from categorie_materials,materiels WHERE 
 materiels.cat_mat_id= categorie_materials.id AND materiels.id=$id " ;
    $reponse2 = $bdd->prepare($req2); 
    $reponse2->execute();
     $row2=$reponse2->fetch();


     
                 // {{$categorie->lib}}

               ?>
                     
                 <p class="text-muted"> <?php echo $row2['libelle']; ?>  </p>
                  </div>
                  </div>
                  

                  
                  <div class="row" style="margin-top: 10px">
                  <div class="col-md-3">
                    <strong>Description:</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$materiel->description}}
                    </p>
                  </div>
                  </div>
                  <?php

$id=$materiel->id;
 $reqx="SELECT name,prenom,date_emprunter from users,materiel_users where materiel_users.user_id=users.id and materiel_users.materiel_id=$id and materiel_users.date_rendu IS NULL " ;
    $reponsex = $bdd->prepare($reqx); 
    $reponsex->execute();
     $rowx=$reponsex->fetch();

                  ?>
                  @if($materiel->autorisation_pret=="1")
                   <div class="row" style="margin-top: 10px">
                  <div class="col-md-3">
                    <strong>Matériel Affecter A User:</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      <?php echo $rowx['name']; ?> <?php echo $rowx['prenom']; ?> 
                    </p>
                  </div>
                  </div>


                  <div class="row" style="margin-top: 10px">
                  <div class="col-md-3">
                    <strong>Dernier Date D'emprunt:</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      <?php echo $rowx['date_emprunter']; ?> 
                    </p>
                  </div>
                  </div>
                  @endif
  <?php

$id=$materiel->id;
 $reqy="SELECT intitule,date_emprunter from equipes,materiel_equipes where materiel_equipes.equipe_id=equipes.id and materiel_equipes.materiel_id=$id and materiel_equipes.date_rendu IS NULL " ;
    $reponsey = $bdd->prepare($reqy); 
    $reponsey->execute();
     $rowy=$reponsey->fetch();

                  ?>                
                  
                  @if($materiel->autorisation_pret=="2")
                   <div class="row" style="margin-top: 10px">
                  <div class="col-md-3">
                    <strong>Matériel Affecter A Equipe:</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      <?php echo $rowy['intitule']; ?>
                    </p>
                  </div>
                  </div>


                   <div class="row" style="margin-top: 10px">
                  <div class="col-md-3">
                    <strong>Dernier Date D'emprunt:</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      <?php echo $rowy['date_emprunter']; ?> 
                    </p>
                  </div>
                  </div>


                  @endif
                  @if($materiel->autorisation_pret=="0")
                   <div class="row" style="margin-top: 10px">
                  <div class="col-md-3">
                    <strong>Matériel Libre:</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      (Le materiel est libre maintenant)
                    </p>
                  </div>
                  </div>
                  @endif




            </div>
              </div>

          <!--/***/-->
              <div class="active tab-pane" id="activity">
            <form class="well form-horizontal" action=" {{url('materiels/'. $materiel->id) }} " method="post"  id="contact_form">

              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}

              <fieldset>

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Nom de matériel</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('nom')) has-error @endif">
                          <div class="input-group"  style="width: 40%">
                            <input  name="name" class="form-control" value="{{$materiel->nom}}" type="text">
                            <span class="help-block">
                                @if($errors->get('nom'))
                                  @foreach($errors->get('nom') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                      </div>

                       <!-- Text input-->
                       
                      <div class="form-group"> 
                          <label class="col-md-3 control-label">Catégorie</label>
                            <div class="col-md-9 selectContainer ">
                              <div class="input-group"  style="width: 40%">
                                  <select name="categorie_id" class="form-control selectpicker">
                                  <?php
   
 $req3="select categorie_materials.id,categorie_materials.libelle from `categorie_materials` inner join `materiels` on `materiels`.`cat_mat_id` = `categorie_materials`.`id` where `materiels`.`id` = $materiel->id  " ;
    $reponse3 = $bdd->prepare($req3); 
    $reponse3->execute();
    $row3=$reponse3->fetch();
                                  ?>
                                    <option 

                                    value="<?php
                                    echo $row3['id'];
                                     ?>">

                                    <?php
                                    echo $row3['libelle'];
                                     ?>


                                    </option>
                                    @foreach($categorieMateriels as $categorieMateriel)
                                    <option value="{{$categorieMateriel->id}}">{{$categorieMateriel->libelle}}</option>
                                    @endforeach
                                  </select>
                                 
                              </div>
                            </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label">Description</label>  
                          <div class="col-md-9 inputGroupContainer @if($errors->get('description')) has-error @endif">
                            <div class="input-group"  style="width: 40%">
                               
                                <textarea class="form-control" name="description" rows="3" >{{$materiel->description}}</textarea>
                                <span class="help-block">
                                @if($errors->get('description'))
                                  @foreach($errors->get('description') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                            </div>
                          </div>
                      </div>
                     
        
         <!--div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-3 control-label">Photo</label>  
                              <div class="col-md-9 inputGroupContainer">
                              <input name="img" type="file" 
                                  value="{{$materiel->photo}}">
                             </div>
                            </div>
                          </div-->




              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('materiels')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>
           <!--/***/-->

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
      </div>

@endsection
              