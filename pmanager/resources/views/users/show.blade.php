@extends('layouts.app')
@section('content')
@section('header')
<style media="screen">
  div.user
  {
    background-color: #fff;
  }
/* start activities of  Every single users such as Companies ,Projects , Tasks ,Comments   */
/* .actions
{
  background-color: #339966;
} */





</style>


@endsection





<div class="col-sm-offset-1 col-sm-9">

  <div class="w3-card-4 user">

  <header class="w3-container w3-light-grey">
    <h3>  {{$user->name}}

  <a  href="/pmanager/public/users/{{$user->id}}/edit" style="margin-left:400px;" class="w3-button w3-blue"> <i class="fa fa-pencil"></i>  Edit</a>
  <a href="/pmanager/public/users/{{$user->id}}/delete" class="w3-button w3-red">  <i class="fa fa-trash"></i> Delete</a>



  </h3>

  </header>

  <div class="w3-container">
    <p> {{$user->job_title}} </p>
    <hr>
  <div class="col-md-1">

    <img src="{{ Request::root().'/user_imgs/'.$user->image}}" style="max-width:400px;" alt="Avatar" class="w3-left w3-sq">
  </div>
    <div class="col-md-offset-6 col-md-5">
      <h2>  {{$user->bio}} </h2>
       <h3> Loreme Ipsum Poto leam kam egan dekt </h3>
    <p>President/CEO at Mighty Schools ....</p>

    </div>

  </div>


  </div>

</div>

<!-- Starting  of Every Single user activities such as Companies , projects ,Tasks , Comments  -->













@endsection
