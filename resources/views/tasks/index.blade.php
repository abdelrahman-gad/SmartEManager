@extends('layouts.app')
@section('content')
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading"> Tasks <a class="pull-right btn btn-success btn-sm " style="margin-bottom:10px;" href="{{route('tasks.create')}}"> Add new Task </a> </div>
  <div class="panel-body">
   <!-- List group -->

   <ul class="list-group">
     @foreach($tasks as $task)
     <a  href="{{route('tasks.show',$task->id)}}">
           <div class="col-sm-4">


         <div class="w3-card-4">
           <div class="w3-display-container w3-text-white">
             <img  class="img_obj" src="{{ Request::root().'/task_imgs/'.$task->image}}"  alt="Lights" style="width:100%; height:300px">

             <p class="w3-button w3-block w3-teal"> {{$task->name}} </p>
           </div>

         </div>

           </div>
           </a>



     @endforeach




     <a href="{{route('tasks.create')}}">
           <div class="col-sm-4">


         <div class="w3-card-4">
           <div class="w3-display-container w3-text-white">
             <img  class="img_obj" src="{{ Request::root().'/th.jpg'}}"  alt="Lights" style="width:100%; height:300px">

 <p class="w3-button w3-block w3-blue-grey"> + add task  </p>
           </div>

         </div>

           </div>
           </a>

     </ul>


</div>

@endsection
