@extends('layouts.app')
@section('content')


<div class="col-sm-9 pull-left" style="background-color: white; padding:30px">
 <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->

           {!! Form::model($project,['route'=>['projects.update',$project->id],'method'=>'PATCH' ,'files'=>'true' ])  !!}


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
   value=" {{$project->name}} "
   >

 </div>

 <div class="form-group">
   <label for="project-content">Description <span class="required">*</span> </label>
  <textarea
   style="resize: vertical;"
   name="description"
   id="project-content"
   placeholder="Enter Description Of  Project    "
   class="form-control "
   spellcheck="true"
    rows="4"
   > {{$project->description}}  </textarea>
 </div>

  <div class="form-group" >
      <label for="image" class="col-md-1">Image </label>
            <div class="col-md-offset-1 col-md-6 ">

              @if(Isset($project))
                @if($project->image !=' ')
                 <img src="{{ Request::root().'/pro_imgs/'.$project->image}}"  height="300"  width="500px">
                @endif
              @endif
<br>
                {!! Form::file('image',null,['class'=>'form-control']) !!}

            </div>


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
              <li><a href="{{route('project.show',$project->id)}}"><i class="fa fa-building-o" aria-hidden="true"></i>
               View projects</a></li>
              <li><a href="{{route('projects.index')}}"><i class="fa fa-building" aria-hidden="true"></i> All Project</a></li>

            </ol>
          </div>
</div>




    @endsection
