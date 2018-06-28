{{--
@extends('layouts.app')

@section('header')
<style media="screen">
 a
 {
   text-decoration: none;
 }

</style>


@endsection
@section('content')
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading"> Users <a class="pull-right btn btn-success btn-sm " style="margin-bottom:10px;" href="/pmanager/public/users/create"> Add new user </a> </div>
</div>


<ul>
    @foreach($users as $user)

<div class="col-md-4 col-sm-12" style="margin-bottom:30px;">
  <div class="w3-card-4 w3-dark-grey" style="padding-bottom:25px;">

  <div class="w3-container w3-center">
    <h3>{{$user->name}}</h3>
    <img  src="{{ Request::root().'/user_imgs/'.$user->image}}" alt="Avatar" style="width:80%">
    <h5> {{$user->job_title}} </h5>

    <a href="/pmanager/public/users/{{$user->id}}/show"  class="w3-button w3-green"> <i class="fa fa-plus"></i>details </a>
    <a  href="/pmanager/public/users/{{$user->id}}/edit" class="w3-button w3-blue"> <i class="fa fa-pencil"></i>  Edit</a>
    <a href="/pmanager/public/users/{{$user->id}}/delete" class="w3-button w3-red">  <i class="fa fa-trash"></i> Delete</a>
  </div>

  </div>
</div>
<hr>

@endforeach



<a href="/pmanager/public/users/create">
      <div class="col-sm-4">


    <div class="w3-card-4">
      <div class="w3-display-container w3-text-white">
        <img  class="img_obj" src="{{ Request::root().'/th.jpg'}}"  alt="Lights" style="width:100%; height:260px">

<p class="w3-button w3-block w3-green"> + Add User  </p>
      </div>

    </div>

      </div>
      </a>



</ul>

@endsection
--}}
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
  <div class="panel-heading"> Users <a class="pull-right btn btn-success btn-sm " style="margin-bottom:10px;" href="/pmanager/public/users/create"> Create new Company </a> </div>
  <div class="panel-body">
   <!-- List group -->



    <ul class="list-group">
      @foreach($users as $user)
<a  href="/pmanager/public/users/{{ $user->id }}/show">
      <div class="col-sm-4">


    <div class="w3-card-4">
      <div class="w3-display-container w3-text-white">
        <img  class="img_obj" src="{{ Request::root().'/user_imgs/'.$user->image}}"  alt="Lights" style="width:100%; height:300px">

        <p class="w3-button w3-block w3-teal"> {{$user->name}} </p>
      </div>

    </div>

      </div>
      </a>





    @endforeach

    <a href="/pmanager/public/users/create">
          <div class="col-sm-4">


        <div class="w3-card-4">
          <div class="w3-display-container w3-text-white">
            <img  class="img_obj" src="{{ Request::root().'/th.jpg'}}"  alt="Lights" style="width:100%; height:300px">

<p class="w3-button w3-block w3-blue-grey"> + add user  </p>
          </div>

        </div>

          </div>
          </a>



    </ul>

  </div>


</div>

@endsection
