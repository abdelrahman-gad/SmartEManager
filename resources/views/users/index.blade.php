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
    

    <a href="{{route('users.show',$user->id)}}"  class="w3-button w3-green"> <i class="fa fa-plus"></i>details </a>
    <a  href="{{route('users.edit',$user->id)}}" class="w3-button w3-blue"> <i class="fa fa-pencil"></i>  Edit</a>
    <a href="{{route('users.destroy',$user->id)}}" class="w3-button w3-red">  <i class="fa fa-trash"></i> Delete</a>
  </div>

  </div>
</div>
<hr>

@endforeach



<a href="{{route('users.create',$user->id)}}">
      <div class="col-sm-4">


    <div class="w3-card-4">
      <div class="w3-display-container w3-text-white">
        <img  class="img_obj" src="{{ Request::root().'/th.jpg'}}"  alt="Lights" style="width:100%; height:300px">

<p class="w3-button w3-block w3-green"> + Add User  </p>
      </div>

    </div>

      </div>
      </a>



</ul>





@endsection
