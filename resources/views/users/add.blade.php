@extends('layouts.app')
@section('content')

<div class="col-sm-9  pull-left" style="background-color: white;">
 <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
     <h1 class="text-center">  Add New  User  </h1>
  {!! Form::open(['method'=>'post','route'=>'users.store','files'=>'true']);  !!}
  <!--  csrf is an abbreviation of Cross Site Request Forgery 
  
  and this field is very important for security mattars
   -->
  {{ csrf_field() }}



 <div class="form-group">
   <label for="user-name">Name <span class="required">*</span> </label>
  <input type="text"
   name="name"
   id="user-name"
   placeholder="Enter Name Of Task "
   class="form-control"
   spellcheck="false"
   >

   </div>




   



  


<div class="form-group">
  <input type="submit" value="Add" class="btn btn-primary btn-block " >

</div>

{!! Form::close() !!}



      <!-- Site footer -->
      <footer class="footer">
        <p>© 2018 users, Inc.</p>
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
