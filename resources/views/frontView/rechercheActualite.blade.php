
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
              
          
            @if(count($actualites) > 0)
              @if(isset($actualites))
              <h3>Actualites:</h3><br>
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Titre</th>
                  <th>Contenu</th>
                  
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                  @foreach($actualites as$actualite)
                  <tr>
                    <td>{{ $actualite->titre }}</td>
                    <td>{{ $actualite->contenu }}</td>
                   
                   
                   

                    </td>
                    <td>
                        
                   <div class="btn-group">
                     <a href="{{ url('actuality/'.$actualite->id)}}" >
                        <i class="fa fa-eye"></i>
                      </a>
                    </div>
                    </td>
                  </tr>
                  @endforeach

                  


                </tbody>
                <tfoot>
                 <tr>
                  <th>Titre</th>
                  <th>Contenu</th>
                  
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
              @endif
            @endif


            </div>
            <!-- /.box-body -->
            @if((count($actualites) == 0))
              <p style="margin-left: 100px; margin-bottom: 50px">Aucune information trouvée</p>
            @endif
          </div>        
      </div>     
    </div>







