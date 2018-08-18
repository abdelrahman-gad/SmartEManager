@extends('layouts.app')
@section('content')


<div class="col-sm-9 pull-left" style="background-color: white;">
 <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
           <h1 class="text-center" > Create New Company</h1>
          {!! Form::open(['method'=>'post','route'=>'companies.store','files'=>'true']);  !!}

  <!--  csrf is an abbreviation of Cross Site Request Forgery -->
  {{ csrf_field() }}



 <div class="form-group">
   <label for="company-name">Name <span class="required">*</span> </label>
  <input type="text"
   name="name"
   id="company-name"
   placeholder="Enter Name Of Company "
   class="form-control"
   spellcheck="false"

   >
 </div>

 <div class="form-group">
   <label for="company-content">Description <span class="required">*</span> </label>
  <textarea
   style="resize: vertical;"
   name="description"
   id="company-content"
   placeholder="Enter Description Of Company   "
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
  <input type="submit" value="ADD" class="btn btn-primary btn-block " >

</div>



{!! Form::close() !!}

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

              <li><a href="{{route('companies.index')}}"><i class="fa fa-building" aria-hidden="true"></i> All companies</a></li>
              <li><a href="{{route('projects.index')}}"><i class="fa fa-building" aria-hidden="true"></i> All Projects</a></li>
              <li><a href="{{route('tasks.index')}}"><i class="fa fa-building" aria-hidden="true"></i> All tasks</a></li>

            </ol>
          </div>
</div>




    @endsection
