@extends('layouts.app')
@section('content')


<div class="col-sm-9 pull-left" style="background-color: white;">
 <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
     <h1 class="text-center"> Create New Project</h1>
  {!! Form::open(['method'=>'post','route'=>'projects.store','files'=>'true']);  !!}
  <!--  csrf is an abbreviation of Cross Site Request Forgery -->
  {{ csrf_field() }}



 <div class="form-group">
   <label for="project-name">Name <span class="required">*</span> </label>
  <input type="text"
   name="name"
   id="project-name"
   placeholder="Enter Name Of project "
   class="form-control"
   spellcheck="false"

   >


<!--  this is a hidden input which make the value of project_id is entered automatically by the controller   -->
   @if($companies == null)
   <input type="hidden"
      name="company_id"
      value=" {{$company_id}} "
   >

   @endif
   </div>




@if($companies !=null)
 <div class="form-group ">
<label for=""> Select a Company </label>
<select name="company_id" id="" class="form-control" >
@foreach($companies as $company)

<option value=" {{$company->id}} "> {{$company->name}} </option>

@endforeach

</select>

</div>
@endif


 <div class="form-group">
   <label for="project-content">Description <span class="required">*</span> </label>
  <textarea
   style="resize: vertical;"
   name="description"
   id="project-content"
   placeholder="Enter Description Of project   "
   class="form-control "
   spellcheck="true"
    rows="4"
   ></textarea>
 </div>
 <div class="form-group">

 <label> Image </label>
 {!! Form::file('image',null,['class'=>'form-control']) !!}

 </div>




<div class="form-group">
  <input type="submit" value="Add" class="btn btn-primary btn-block " >

</div>

{!! Form::close() !!}

      <div class="row">

      </div>

      <!-- Site footer -->
      <footer class="footer">
        <p>© 2016 project, Inc.</p>
      </footer>

    </div>

<div class="col-sm-3">

  <div class="sidebar-module " style="margin: 10px">
            <h4>Actions</h4>
            <ol class="list-unstyled">

              <li><a href="/pmanager/public/companies"><i class="fa fa-building" aria-hidden="true"></i> All companies</a></li>
              <li><a href="/pmanager/public/projects"><i class="fa fa-building" aria-hidden="true"></i> All Projects</a></li>
              <li><a href="/pmanager/public/tasks"><i class="fa fa-building" aria-hidden="true"></i> All tasks</a></li>

            </ol>
          </div>
</div>




    @endsection
