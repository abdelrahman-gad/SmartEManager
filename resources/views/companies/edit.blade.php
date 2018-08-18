@extends('layouts.app')
@section('content')


<div class="col-sm-9 pull-left" style="background-color:white; padding: 30px;">
 <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
           {!! Form::model($company,['route'=>['companies.update',$company->id],'method'=>'PATCH' ,'files'=>'true' ])  !!}


  <!--  csrf is an abbreviation of Cross Site Request Forgery -->
  {{ csrf_field() }}

 <input type="hidden" name="_method"  value="put">

 <div class="form-group">
   <label for="company-name">Name <span class="required">*</span> </label>
  <input type="text"
   name="name"
   id="company-name"
   placeholder="Enter Name Of Company "
   class="form-control"
   spellcheck="false"
   value=" {{$company->name}} "
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
   > {{$company->description}}  </textarea>
 </div>

 <div class="form-group" >
     <label for="image" class="col-md-1">Image </label>
           <div class="col-md-offset-1 col-md-6 ">
            @if(Isset($company))
              @if($company->image !=' ')
               <img src="{{ Request::root().'/com_imgs/'.$company->image}}"  height="300"  width="500px">
              @endif
            @endif


               {!! Form::file('image',null,['class'=>'form-control']) !!}

           </div>


       </div>




<br><br>



 <div class="form-group">
  <input type="submit" value="Update" class="btn btn-primary btn-block " >

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
              <li><a href="{{route('companies.show',$company->id)}}"><i class="fa fa-building-o" aria-hidden="true"></i>
               View companies</a></li>
              <li><a href="{{route('companies.index')}}"><i class="fa fa-building" aria-hidden="true"></i> All companies</a></li>

            </ol>
          </div>
</div>




    @endsection
