
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="{{asset('easy.png')}}"/>
  <title>
    @yield('title')
  </title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('labo/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('labo/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('labo/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('labo/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('labo/plugins/iCheck/all.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('labo/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('labo/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('labo/bower_components/select2/dist/css/select2.min.css')}}">
<!-- ICI-->

<div class="row">
      <div class="col-xs-12">
        <div class="box col-xs-12">
          <div class="container" style="padding-top: 30px">
          <div class="row" style="padding-bottom: 20px">
            <div class="box-header col-xs-9">
              <h2 class="box-title">Le résultat de la rechereche</h2>
            </div>
          </div>
          </div>
            <!-- /.box-header -->
        <div class="box-body">
              
          @if(count($equipes) > 0)
            @if(isset($equipes))
              <h3>Equipes:</h3><br>
              <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Achronyme</th>
                  <th>inttitulé</th>
                  <th>Chef</th>
                 
                </tr>
                </thead>
                <tbody>
                  @foreach($equipes  as $equipe)
                  <tr>
                    <td>{{$equipe->achronymes}}</td>
                    <td>{{$equipe->intitule}}</td>
                    <td>{{$equipe->chef->name}} {{$equipe->chef->prenom}}</td>
                    <td>
                      <div class="btn-group">
                       
                            <a href="{{url('services/'.$equipe->id)}}" 
                            >
                              <i class="fa fa-eye"></i>
                            </a>
                         
                      </div>
                    </td>
                  </tr>
                  @endforeach
                   
                </tbody>
                <tfoot>
                <tr>
                  <th>Achronyme</th>
                  <th>inttitulé</th>
                  <th>Chef</th>
                  <th>Action</th>
                  
                </tr>
                </tfoot>
              </table>
            @endif
          @endif

          @if(count($membres) > 0)
            @if(isset($membres))

            <h3>Membres:</h3><br>
              <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Email</th>
                  <th>Grade</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($membres  as $membre)
                  <tr>
                    <td>{{$membre->name}}</td>
                    <td>{{$membre->prenom}}</td>
                    <td>{{$membre->email}}</td>
                    <td>{{$membre->grade}}</td>
                    <td>
                      <div class="btn-group">
                        
                        

                            <a href="{{ url('info_membre/'.$membre->id.'/id/'.$membre->equipe->id)}}" 
                           >
                              <i class="fa fa-eye"></i>
                            </a>

                           
                      
                      </div>
                    </td>
                  </tr>
                  @endforeach
                   
                </tbody>
                <tfoot>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Email</th>
                  <th>Grade</th>
                  <th>Action</th>
                  
                </tr>
                </tfoot>
              </table>
            @endif
            @endif

            @if(count($theses) > 0)
              @if(isset($theses))
              <h3>Theses:</h3><br>
              <table class="table table-bordered  table-striped">
                <thead>
                <tr>
                  <th>Titre</th>
                  <th>Sujet</th>
                  <th>Doctorant</th>
                  <th>Encadreur</th>
                  <th>CoEncadreur</th>
                  <th>Date Soutenance</th>
                 
                </tr>
                </thead>
                <tbody>
                  @foreach($theses as $these)
                  <tr>
                    <td>{{$these->titre}}</td>
                    <td>{{$these->sujet}}</td>
                    <td>{{$these->user->name}} {{$these->user->prenom}}</td>
                    <td>{{$these->encadreur_int}}{{$these->encadreur_ext}}</td>
                    <td>{{$these->coencadreur_int}}{{$these->coencadreur_ext}}</td>
                    <td>{{$these->date_soutenance}}</td>
                    
                  </tr>
                  @endforeach
                 </tbody>
                <tfoot>
                <tr>
                  <th>Titre</th>
                  <th>Sujet</th>
                  <th>Doctorant</th>
                  <th>Encadreur</th>
                  <th>CoEncadreur</th>
                  <th>Date_Soutenance</th>
                  
                </tr>
                </tfoot>
              </table>
              @endif
            @endif
            @if(count($projets) > 0)
              @if(isset($projets))
              <h3>Projets:</h3><br>
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Intitulé</th>
                  <th>Type</th>
                  <th>Partenaires</th>
                  <th>Chef</th>
                  <th>Membres</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                  @foreach($projets as $projet)
                  <tr>
                    <td>{{ $projet->intitule }}</td>
                    <td>{{ $projet->type }}</td>
                    <td>{{ $projet->partenaires }}</td>
                    <td>{{ $projet->chef->name}} {{ $projet->chef->prenom}}</a></td>
                    <td>
                      @foreach ($projet->users as $user) 
                      <ul>
                          <li>{{ $user->name }} {{ $user->prenom }}</li>
                      </ul>
                    @endforeach

                    </td>
                    <td>
                        
                   <div class="btn-group">
                     <a href="{{ url('projet/'.$projet->id)}}" >
                        <i class="fa fa-eye"></i>
                      </a>
                    </div>
                    </td>
                  </tr>
                  @endforeach

                  


                </tbody>
                <tfoot>
                 <tr>
                  <th>Intitulé</th>
                  <th>Type</th>
                  <th>Partenaires</th>
                  <th>Chef</th>
                  <th>Membres</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
              @endif
            @endif


            </div>
            <!-- /.box-body -->
            @if((count($equipes) == 0)&&(count($membres) == 0) && (count($theses) == 0) &&(count($projets) == 0))
              <p style="margin-left: 100px; margin-bottom: 50px">Aucune information trouvée</p>
            @endif
          </div>        
      </div>     
    </div>







