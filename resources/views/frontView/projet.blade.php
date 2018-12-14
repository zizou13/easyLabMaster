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
                      
                      <h2 >RADIO COGNITIVE</h2>
                      <hr size="s" width="100%"  align = "LEFT " color = "#666666" noshade >
                      <br>
                      <table class="table" >
                         <tr>
                            <th>SUJET: </td><td>Synthèse de profiles applicatifs</td>
                         </tr>
                         <tr>
                            <th>DESCRIPTION:  </td><td>
                            Travaux  de  Joseph  Mitola (1991):  définir  une  classe  de  radio 
                             reprogrammable et reconfigurable
                             </td>
                         </tr>
                         <tr>
                            <th>MEMBRE DE PROJET: </td>
                            <td><li>Asma Amraoui </li>
                                <li>Wassila Baghli</li>
                                <li>Badr Benmamer</li>
                                
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
                         <img  class="logo" src="{{asset('frontEnd')}}/img/imM/projet21.jpg" 
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