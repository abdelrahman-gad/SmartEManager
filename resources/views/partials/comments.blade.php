


<div class="row">
<div class="col-sm-10 col-sm-offset-1" >

<form method="post" action="{{route('comments.store')}} " >
  <!--  csrf is an abbreviation of Cross Site Request Forgery -->
  {{ csrf_field() }}

@if(Isset($company))
  <input type="hidden"  name="commentable_type" value="company" >
  <input type="hidden"  name="commentable_id" value="{{$company->id}} " >
@elseif(Isset($project))
<input type="hidden"  name="commentable_type" value="project" >
<input type="hidden"  name="commentable_id" value="{{$project->id}} " >
@else
<input type="hidden"  name="commentable_type" value="task" >
<input type="hidden"  name="commentable_id" value="{{$task->id}} " >

@endif

  <div class="form-group">
   <label for="comment-content" style="color:#ddd;" >Comment<span class="required">*</span> </label>
  <textarea
   style="resize: vertical;"
   name="body"
   id="comment-content"
   placeholder="Enter  Comment  "
   class="form-control "
   spellcheck="true"
    rows="3"
   ></textarea>
 </div>




 <div class="form-group">
   <label for="comment-content" style="color:#ddd;">Proof( that the work is Done) <span class="required">*</span> </label>
 <textarea  rows="2"
 type="text"
   name="url"
   id="comment-content"
   placeholder="Enter URL or photo  "
   class="form-control"
   spellcheck="false"
 >

  </textarea>
 </div>

<div class="form-group">
  <input type="submit" value="Comment" class="btn btn-primary btn-block " >

</div>
</div>



</div>





 <div class="row">
 <div class="col-sm-10 col-sm-offset-1">

     <!-- Fluid width widget -->
     <div class="panel panel-primary">
         <div class="panel-heading">
             <h3 class="panel-title">
                 <span class="glyphicon glyphicon-comment"></span> 
                 Recent Comments
             </h3>
         </div>

         <div class="panel-body">
             <ul class="media-list">

             @foreach($comments as $comment)
                 <li class="media">
                     <div class="media-left">
                         <img src="http://placehold.it/60x60" class="img-circle">
                     </div>
                     <div class="media-body">
                         <h3 class="media-heading">


                                 commented by : <a  href="{{route('users.show',$comment->user->id)}}"  >
                    {{ $comment->user->name}} </a>
                        <br>



                         </h3>
                         <h4 >
                           <i class="fa fa-comment"></i>   {{ $comment->body }}
                         </h4>
                       <p class="badge">  {{ $comment->created_at}}</p>
                     </div>
                 </li>

                 @endforeach
             </ul>
         </div>
     </div>


     <!-- End fluid width widget -->

 </div>
</div>
