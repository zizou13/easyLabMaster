
@extends('layouts.master')

@section('title','LRI | Trombinoscope')



@section('content')

    
                <legend><center><h2><b>TROMBINOSCOPE</b></h2></center></legend><br>
    <div class="row">
      <div class="col-md-12">
        <div style="padding-top: 30px">

         @foreach($membres as $membre)
            <div class="col-md-2 col-sm-4 col-xs-6" style="padding-top: 30px;" >
              
               <a href="{{url('membres/'.$membre->id.'/details')}}">
                <img style="height: 200px width:200px; " class="img-thumbnail img-responsive img-circle" src="{{asset($membre->photo)}}" alt="User profile picture" title="{{($membre->name)}} {{($membre->prenom)}}"></a>
              
            </div>
        @endforeach
            
        </div>
      </div> 
    </div>
    @endsection
