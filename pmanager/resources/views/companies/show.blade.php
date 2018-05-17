@extends('layouts.app')
@section('content')


<div class="col-sm-9 pull-left">
 <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->


      <!-- Jumbotron -->
      <div class="well well-lg ">
        <h1>  {{$company->name}} </h1>
        <p class="lead"> {{ $company->description }} </p>
        <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
  <img src="{{ Request::root().'/com_imgs/'.$company->image}}" class="img-responsive">

      </div>

      <!-- Example row of columns -->
      <div class="row">

      <p > Projects </p>
  <a href="/pmanager/public/projects/create/{{ $company->id }}" class="btn btn-success  pull-right" > Add Project </a>

      @foreach($company->projects as $project)
        <div class="col-lg-4">
          <h2> {{$project->name}} </h2>
          <p class="text-danger"> {{$project->description}} </p>

          <p><a class="btn btn-primary" href="/pmanager/public/projects/{{$project->id}}" role="button">View Project </a></p>
        </div>
      @endforeach

      </div>



      <!-- Site footer -->
      <footer class="footer">
        <p>© 2016 Company, Inc.</p>
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
              <li><a href="/pmanager/public/companies/{{ $company->id }}/edit">Edit</a></li>
              <li><a href="/pmanager/public/projects/create/{{ $company->id }}">Add Projects</a></li>
              <li><a href="/pmanager/public/companies">List of companies</a></li>
              <li><a href="/pmanager/public/companies/create">Add new Company</a></li>

              <li>
              <a href="#"
              onclick="
              var result = confirm('Are you sure you wish to delete this Company?');
                  if( result ){
                          console.log(result);
                          event.preventDefault();
                          document.getElementById('delete-form').submit();
                  }
                      "
               >


              Delete
              </a>
              <form method="post" style="display:none" id="delete-form" action=" {{route('companies.destroy',[$company->id])}} " >
              {{ csrf_field() }}
              <input type="hidden"  name="_method"  value="delete" >




              </form>


              </li>




              <!-- <li><a href="#">Add New Member</a></li> -->
            </ol>
          </div>


        </div>






    @endsection
