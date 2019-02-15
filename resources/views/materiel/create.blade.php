@extends('layouts.master')

@section('title','LRI | Liste des matériels')

@section('header_page')

      <h1>
        Materiels
        <small>Nouveau</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('materiels')}}">Materiels</a></li>
        <li class="active">Ajouter</li>
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

       
        <li >
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
     
    <div class="row" style="padding-top: 30px">
      <div class="col-xs-12">
        <div class="box">
            
          <div class="container col-xs-12">

            <form class="well form-horizontal" action="{{url('materiels')}}" method="post"  id="contact_form" enctype="multipart/form-data">
              {{ csrf_field() }}

              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Nouveau matériel</b></h2></center></legend><br>

                <div class="form-group"> 
                          <label class="col-md-3 control-label">Catégorie du matériel</label>
                            <div class="col-md-9 selectContainer @if($errors->get('equipe')) has-error @endif">
                              <div class="input-group" div style="width: 70%">
                              <span class="input-group-addon"><i class="fa-list-alt "></i></span>
                                  <select name="categorie" class="form-control selectpicker">
                                   <option></option>
                                    @foreach($categorieMateriels as $categorieMateriel)
                       
                                    <option value="{{$categorieMateriel->id}}">
                                  @if($categorieMateriel->libelle!=NULL)   {{$categorieMateriel->libelle}} @endif
                                  @if($categorieMateriel->libelle==NULL) NULL @endif

                                   
                                    </option>
                                   
                                    @endforeach
                                  </select>

                              </div>

                              <span class="help-block">
                                @if($errors->get('equipe_id'))
                                  @foreach($errors->get('equipe_id') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                            </div>
                      </div>


                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Nom de matériel (*)</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('intitule')) has-error @endif">
                          <div style="width: 70%" class="input-group">
                          <span class="input-group-addon"><i class="fa fa-laptop"></i></span>
                            <input  name="name_mat" class="form-control" placeholder="Nom du matériel" type="text" value="{{old('intitule')}}">
                            <span class="help-block">
                                @if($errors->get('intitule'))
                                  @foreach($errors->get('intitule') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                  </div> 

                  <div class="form-group">
                      <label class="col-md-3 control-label">Description (*)</label>
                      <div class="col-md-9 inputGroupContainer @if($errors->get('resume')) has-error @endif">
                        <div style="width: 70%">
                          <textarea class="form-control" name="description" rows="3" placeholder="description ...">{{old('resume')}}</textarea>
                          <span class="help-block">
                                @if($errors->get('resume'))
                                  @foreach($errors->get('resume') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>
                  </div>


                  <!--div class="form-group"> 
                          <label class="col-md-3 control-label">Affecter à Equipe *</label>
                            <div class="col-md-9 selectContainer @if($errors->get('equipe')) has-error @endif">
                              <div class="input-group" div style="width: 70%">
                              <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                  <select name="equipe" class="form-control selectpicker">
                                    <option></option>
                                     @foreach($equipes as $equipe)
                                    <option value="{{$equipe->id}}">{{$equipe->intitule}}</option>
                                    @endforeach
                                  </select>

                              </div>

                              <span class="help-block">
                                @if($errors->get('equipe_id'))
                                  @foreach($errors->get('equipe_id') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                            </div>
                      </div>
        
                    <div class="form-group " >
                        <label class="col-xs-3 control-label">Affecter à User (*)</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('user_id')) has-error @endif">
                          <div style="width: 70%">
                            <select name="user" class="form-control select2" >
                              
                               @foreach($membres as $membre)
                              <option value="{{$membre->id}}">{{$membre->name}} {{$membre->prenom}}</option>
                               @endforeach
                            </select>

                            <span class="help-block">
                                @if($errors->get('user_id'))
                                  @foreach($errors->get('user_id') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                          </div>
                        </div>
                  </div>  

                  <div class="form-group">
                            <label class="col-xs-3 control-label">Date d'emprunt(*)</label> 
                            <div class="col-xs-9 inputGroupContainer input-group Date" style="width: 52%">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input name="date_emprunt" type="text" class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="datepicker" value="{{old('date_naissance')}}">
                            </div>
                      </div>
                    <div class="form-group">
                            <label class="col-md-3 control-label">Date de retour</label>  
                            <div class="col-xs-9 inputGroupContainer input-group Date " style="width: 52%">
                              <div class="input-group-addon" >
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input name="date_retour" type="text" class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="datepicker" value="{{old('date_naissance')}}">
                            </div>
                      </div-->

                 

                 <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-3 control-label">Photo</label>  
                              <div class="col-md-9 inputGroupContainer">
                              <input name="img" type="file" >
                             </div>
                            </div>
                          </div>


              </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('materiels')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>
    
  @endsection





        

