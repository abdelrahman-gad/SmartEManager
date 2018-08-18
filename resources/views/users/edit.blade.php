@extends('layouts.app')
@section('content')


<div class="col-sm-9" style="background-color: white; padding:30px;">
 <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->



      {!! Form::model($user,['route'=>['users.update',$user->id],'method'=>'PATCH' ,'files'=>'true' ])  !!}


             <!--  csrf is an abbreviation of Cross Site Request Forgery -->
             {{ csrf_field() }}


                 <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                     <label for="name" class="col-md-4 control-label">Name</label>

                     <div class="col-md-6">
                         <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus>

                         @if ($errors->has('name'))
                             <span class="help-block">
                                 <strong>{{ $errors->first('name') }}</strong>
                             </span>
                         @endif
                     </div>
                 </div>

           <br><br>

                 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                     <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                     <div class="col-md-6">
                         <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" required>

                         @if ($errors->has('email'))
                             <span class="help-block">
                                 <strong>{{ $errors->first('email') }}</strong>
                             </span>
                         @endif
                     </div>
                 </div>
           <br><br>


<div class="form-group">
  <input type="submit" value="Edit User" class="btn btn-primary btn-block " >

</div>

{!! Form::close() !!}



      <!-- Site footer -->
      <footer class="footer">
        <p>© 2018 users, Inc.</p>
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
