@extends('layouts.app')
@section('content')


<div class="col-sm-9 pull-left" style="background-color: white; padding:30px">
 <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->

           {!! Form::model($task,['route'=>['tasks.update',$task->id],'method'=>'PATCH' ,'files'=>'true' ])  !!}


  <!--  csrf is an abbreviation of Cross Site Request Forgery -->
  {{ csrf_field() }}


 <input type="hidden" name="_method"  value="put">

 <div class="form-group">
   <label for="project-name">Name <span class="required">*</span> </label>
  <input type="text"
   name="name"
   id="project-name"
   placeholder="Enter Name Of Project "
   class="form-control"
   spellcheck="false"
   value=" {{$task->name}} "
   >

 </div>

 <div class="form-group">
   <label for="project-content"> Content <span class="required">*</span> </label>
  <textarea
   style="resize: vertical;"
   name="content"
   id="project-content"
   placeholder="Enter Description Of  Project    "
   class="form-control "
   spellcheck="true"
    rows="4"
   > {{$task->content}}  </textarea>
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







  <div class="form-group" >
      <label for="image" class="col-md-1">Image </label>
            <div class="col-md-offset-1 col-md-6 ">

              @if(Isset($task))
                @if($task->image !=' ')
                 <img src="{{ Request::root().'/task_imgs/'.$task->image}}"  height="300"  width="500px">
                @endif
              @endif
<br>
                {!! Form::file('image',null,['class'=>'form-control']) !!}

            </div>

<br>
        </div>

<br>

        <div class="form-group">
          <label for="project-name">Days <span class="required">*</span> </label>
         <input type="text"
          name="days"
          id="days"
          placeholder="Enter Name Of Project "
          class="form-control"
          spellcheck="false"
          value=" {{$task->days}} "
          >

        </div>





        <div class="form-group">
          <label for="hours">Days <span class="required">*</span> </label>
         <input type="text"
          name="hours"
          id="hours"
          placeholder="Enter Name Of Project "
          class="form-control"
          spellcheck="false"
          value=" {{$task->hours}} "
          >

        </div>

         <div class="form-group">
          <input type="submit" value="Update" class="btn btn-primary btn-block " >

        </div>
<br> <br>
{!!Form::close() !!}

      <div class="row">

      </div>

      <!-- Site footer -->
      <footer class="footer">
        <p>© 2016 Company, Inc.</p>
      </footer>

    </div>

<div class="col-sm-3">

  <div class="sidebar-module " style="margin: 10px">
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="/pmanager/public/tasks/{{ $task->id }}"><i class="fa fa-building-o" aria-hidden="true"></i>
               View projects</a></li>
              <li><a href="/pmanager/public/tasks"><i class="fa fa-building" aria-hidden="true"></i> All Project</a></li>

            </ol>
          </div>
</div>




    @endsection
