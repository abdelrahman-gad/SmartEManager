@extends('layouts.app')
@section('content')


<div class="col-sm-9  pull-left" style="background-color: white;">
 <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
     <h1 class="text-center">  Add New Task  </h1>
  {!! Form::open(['method'=>'post','route'=>'tasks.store','files'=>'true']);  !!}
  <!--  csrf is an abbreviation of Cross Site Request Forgery -->
  {{ csrf_field() }}



 <div class="form-group">
   <label for="task-name">Name <span class="required">*</span> </label>
  <input type="text"
   name="name"
   id="project-name"
   placeholder="Enter Name Of Task "
   class="form-control"
   spellcheck="false"

   >


<!--  this is a hidden input which make the value of project_id is entered automatically by the controller   -->
   @if($projects == null)
   <input type="hidden"
      name="project_id"
      value=" {{$project_id}} "
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




@if($projects !=null)
 <div class="form-group ">
<label for=""> Select a Project </label>
<select name="project_id" id="" class="form-control" >
@foreach($projects as $project)

<option value=" {{$project->id}} "> {{$project->name}} </option>

@endforeach

</select>

</div>
@endif


<div class="form-group">
   <label for="project-content">content <span class="required">*</span> </label>
  <textarea
   style="resize: vertical;"
   name="content"
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
    <label for="task-name">Days of project<span class="required">*</span> </label>
   <input type="text"
    name="days"
    id="days"
    placeholder="Enter Name Of Task "
    class="form-control"
    spellcheck="false"

    >

     <div class="form-group">
       <label for="hours">houre of project per day <span class="required">*</span> </label>
      <input type="number"
       name="hours"
       id="hours"
       placeholder="Enter Name Of Task "
       class="form-control"
       spellcheck="false"

       >




<div class="form-group">
  <input type="submit" value="Add" class="btn btn-primary btn-block " >

</div>

{!! Form::close() !!}



      <!-- Site footer -->
      <footer class="footer">
        <p>© 2016 project, Inc.</p>
      </footer>

    </div>
</div>
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
