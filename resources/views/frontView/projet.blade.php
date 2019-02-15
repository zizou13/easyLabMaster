@extends('layouts.master2')
@Section('lien')
<link rel="stylesheet" href="{{asset('frontEnd')}}/css/style2.css">
 
 <link href="{{asset('frontEnd')}}/css/bootstrap.min.css" rel="stylesheet">
@endsection
@Section('content')
   
  <style type="text/css">
   body{
      background-image: url('{{asset('frontEnd')}}/img/backg2.jpg');
    }
    td{
      color: black;
    }
    li{
      list-style: none;
    }
    
  


  </style>
  

 <div class="content-wrapper" >
        <div class="container">
              <div class="row" id="cont">
                    <div  class="col-lg-8">
                      
                      <h2 >{{$projet->intitule}}</h2>
                      <hr size="s" width="100%"  align = "LEFT " color = "#666666" noshade >
                      <br>
                      <table class="table" >
                         <tr>
                            <th>SUJET: </td>
                            <td>{{$projet->intitule}}</td>
                         </tr>
                         <tr>
                            <th>DESCRIPTION:  </td><td>
                            {{$projet->resume}}
                             </td>
                         </tr>
                         <tr>
                            <th>MEMBRE DE PROJET: </td>

                            <td>
                             @foreach( $membreProjets as  $membreProjet)
                                
                                <li>{{$membreProjet->name}} {{$membreProjet->prenom}}</li>
                                @endforeach
                            </td>
                         </tr>
                         
                              </table>
                         </tr>

                         <br>
                         <tr>
                            <td> 
                            <button type="button"  onclick="self.location.href='{{url('membre')}}'" class="btn btn-primary " id="btQuitter"> 
                                   QUITTER 
                            </button>
                            <br><br>
                           </td>
                         </tr>
                        
                      </table>

                        
                    </div>
                    <div class="col-lg-4">
                         <img  class="logo" src="{{asset($projet->photoProjet)}}" 
                         class="img-circle images_petit"
                          style="height: 400px;width: 300px;">
                    </div>
              </div>
        </div>

       
       



   @endsection


@section('footer')


@endsection
@section('script')


@endsection