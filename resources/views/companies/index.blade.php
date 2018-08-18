@extends('layouts.app')
@section('header')

<style media="screen">
/* start cards  of (companies, projects ,tasks)  */
.img_obj
{
  width:110%;
  height: 320px;
}


/* end cards  of (companies, projects ,tasks)  */



</style>


@endsection




@section('content')
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading"> Companies <a class="pull-right btn btn-success btn-sm " style="margin-bottom:10px;" href="{{route('companies.create')}}"> Create new Company </a> </div>
  <div class="panel-body">
   <!-- List group -->



    <ul class="list-group">
      @foreach($companies as $company)
<a  href="{{route('companies.show',$company->id)}}">
      <div class="col-sm-4">


    <div class="w3-card-4">
      <div class="w3-display-container w3-text-white">
        <img  class="img_obj" src="{{ Request::root().'/com_imgs/'.$company->image}}"  alt="Lights" style="width:100%; height:300px">

        <p class="w3-button w3-block w3-teal"> {{$company->name}} </p>
      </div>

    </div>

      </div>
      </a>





    @endforeach

    <a href="{{route('companies.create')}}">
          <div class="col-sm-4">


        <div class="w3-card-4">
          <div class="w3-display-container w3-text-white">
            <img  class="img_obj" src="{{ Request::root().'/th.jpg'}}"  alt="Lights" style="width:100%; height:300px">

<p class="w3-button w3-block w3-blue-grey"> + add Company  </p>
          </div>

        </div>

          </div>
          </a>



    </ul>

  </div>


</div>

@endsection
