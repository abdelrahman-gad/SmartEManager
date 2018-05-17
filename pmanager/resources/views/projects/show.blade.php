@extends('layouts.app')
@section('content')


<div class="col-sm-9 pull-left">
 <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->


      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>  {{$project->name}} </h1>
        <p class="lead"> {{ $project->description }} </p>
        <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
         <img src="{{ Request::root().'/pro_imgs/'.$project->image}}"  width="100%">
      </div>

      <!-- Example row of columns -->
      <div class="row">
  <a href="/pmanager/public/projects/create" class="btn btn-success  pull-right" > Add Project </a>
<br/>

@include('partials.comments')







{{--
      @foreach($project->projects as $project)
        <div class="col-lg-4">
          <h2> {{$project->name}} </h2>
          <p class="text-danger"> {{$project->description}} </p>

          <p><a class="btn btn-primary" href="localhost/public/projects/ {{$project->id}} " role="button">View Project </a></p>
        </div>
      @endforeach
      --}}
      </div>

      <!-- Site footer -->
      <footer class="footer">
        <p>© 2016 project, Inc.</p>
      </footer>

    </div>


<div class="col-md-3  blog-sidebar">
         <!--  <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
           <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="/pmanager/public/projects/{{ $project->id }}/edit"> <i class="fa fa-pencil" aria_hidden="true" ></i> Edit</a></li>

              <li><a href="/pmanager/public/projects"> <i class="fa fa-list" aria-hidden="true"></i>  List of projects</a></li>
              <li><a href="/pmanager/public/projects/create"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Add new project</a></li>

@if($project->user_id==Auth::user()->id )
<li>
<a href="/pmanager/public/projects/{{$project->id}}/delete"

 >

 <i class="fa fa-trash" aria-hidden="true"></i>
Delete
</a>


</li>
@endif




              <!-- <li><a href="#">Add New Member</a></li> -->
            </ol>

<!-- start add item -->

<h4>Add members</h4>
          <div class="row">
            <div class="col-sm-12">
            <form class="form-group" id="add-user" method="POST" action="adduser">
            {{csrf_field()}}
              <div class="input-group">
                <input type="text" class="form-control " placeholder="Enter Email .....">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit">Add</button>
                </span>
              </div><!-- /input-group -->
          </form>
  </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->
<br/>

<h4>Team Members</h4>
<ol class="list-unstyled">
@foreach($project->user as $user)
  <li> <a href="#">  {{$user->email}}  </a> </li>

 @endforeach
</ol>





<!-- end add item -->
          </div>


        </div>






    @endsection
