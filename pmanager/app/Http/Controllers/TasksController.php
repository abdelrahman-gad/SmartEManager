<?php

namespace App\Http\Controllers;
use App\Project;
use App\Company;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;
use App\Task;
use App\User;
class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//
if( Auth::check() ){
  $tasks=Task::where('user_id', Auth::user()->id)->get();
  //  $projects = Project::where('user_id', Auth::user()->id)->get();

     return view('tasks.index', ['tasks'=> $tasks]);



}
return view('auth.login');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id=null  ,$company_id=null )
    {



            $companies = null;
            if(!$company_id){
               $companies = Company::where('user_id', Auth::user()->id)->get();
            }



      $projects = null;
      if(!$project_id){
         $projects = Project::where('user_id', Auth::user()->id)->get();
      }


      return view('tasks.create',['project_id'=>$project_id, 'projects'=>$projects,'company_id'=>$company_id,'companies'=>$companies]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



            $img=  Image::make($request->file('image'));

            //get the name of image to use it again storing in database

            $imgName=$request->file('image')->getClientOriginalName();



            // modifing and customizing my image (resizing , archiving)
            $img->resize(350,null,function($ratio)
            {
            $ratio->aspectRatio();
            });
            // save the image in the directory which i need
              $img->save(public_path('task_imgs/'.$imgName),60);




             if(Auth::check()){
                 $task = Task::create([
                     'name' => $request->input('name'),
                     'content' => $request->input('content'),
                     'days' => $request->input('days'),
                     'hours' => $request->input('hours'),
                     'company_id' => $request->input('company_id'),
                     'project_id' => $request->input('project_id'),

// error  editing in project id add project editing in task.edit
                     'image'=>$imgName,

                     'user_id' => Auth::user()->id
                 ]);




                 if($task){
                     return redirect()->route('tasks.show', ['task'=> $task->id])
                     ->with('success' , 'Task  was added successfully');
                 }
 }
}






    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {

    //

     // $project = Project::where('id', $project->id )->first();
     $task = Task::find($task->id);
     $comments=Comment::where('commentable_id',$task->id)->get();
$users=User::all();
      return view('tasks.show', ['task'=>$task, 'comments'=> $comments,'users'=>$users ]);
          }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task ,Request $request,$company_id=null,$project_id=null)
    {

      $task = Task::find($task->id);



                  $companies = null;
                  if(!$company_id){
                     $companies = Company::where('user_id', Auth::user()->id)->get();
                  }



            $projects = null;
            if(!$project_id){
               $projects = Project::where('user_id', Auth::user()->id)->get();
            }

      return view('tasks.edit', ['task'=>$task,'company_id'=>$company_id,'companies'=>$companies,'project_id'=>$project_id,'projects'=>$projects]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //save data

        $img=  Image::make($request->file('image'));

                        //get the name of image to use it again storing in database

                        $imgName=$request->file('image')->getClientOriginalName();


                        // modifing and customize my image (resizing , archiving)
                        $img->resize(350,null,function($ratio)
                        {
                        $ratio->aspectRatio();
                        });


                        // save the image in the directory which i need
                            $img->save(public_path('task_imgs/'.$imgName),60);





               $taskUpdate = Task::where('id', $task->id)
                                         ->update([
                                                 'name'=> $request->input('name'),
                                                 'content'=> $request->input('content'),
                                                 'days'=> $request->input('days'),
                                                 'hours'=> $request->input('hours'),
                                                 'image'=>$imgName,
                                                 'company_id' => $request->input('company_id'),
                                                 'project_id' => $request->input('project_id'),
                                                 'user_id' => Auth::user()->id
                                         ]);


               if($taskUpdate){
                   return redirect()->route('tasks.show', ['task'=> $task->id])
                   ->with('success' , 'Task updated successfully');
               }
               //redirect
               return back()->withInput();



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task ,$id)
    {



      $findTask = Task::find($id);


            if($findTask->delete()){

          //redirect
          return redirect()->route('tasks.index')
          ->with('success' , 'task was deleted successfully');
      }

      return back()->withInput()->with('error' , 'tasks Error deleting  ');

    }
}
