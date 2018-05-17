<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Project;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;
use App\User;
class ProjectsController extends Controller
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
             $projects = Project::where('user_id', Auth::user()->id)->get();

              return view('projects.index', ['projects'=> $projects]);
              //$compunds=Compound::Where('project_id',Project()->id());


         }
         return view('auth.login');
     }


public function adduser(Request $request)
{
        // add user to the project
        $project=Project::find($request->input('project_id'));
        if(Auth::user()->id == $project['user_id'] ){

        $user=User::where('email',$request->input('email'))->first();
        if($project  && $user)
        {

            $project->users()->attach($user_id);
        return redirect()->route('projects.show',['project',$project_id])->with('success',$request->input('email').'was added successfully');

        }

    }
        return redirect()->route('projects.show',['project',$project_id])->with('errors',$request->input('email').'Error Adding User');






}


     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create( $company_id = null )
     {
         //





         $companies = null;
         if(!$company_id){
            $companies = Company::where('user_id', Auth::user()->id)->get();
         }

         return view('projects.create',['company_id'=>$company_id, 'companies'=>$companies]);
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request )
     {

       // if($request->file('image'))
       //     {
       //       $fileName=$request->file('image')->getClientOriginalName();
       //
       //
       //       $buRequest->file('image')->move( base_path().'/public/website/bu_images/',$fileName);
       //
       //     $image=$fileName;
       //     }else
       //     {
       //       $image='';
       //     }


      $img=  Image::make($request->file('image'));

      //get the name of image to use it again storing in database

      $imgName=$request->file('image')->getClientOriginalName();



      // modifing and customizing my image (resizing , archiving)
      $img->resize(350,null,function($ratio)
      {
      $ratio->aspectRatio();
      });
      // save the image in the directory which i need
        $img->save(public_path('pro_imgs/'.$imgName),60);







         if(Auth::check()){
             $project = Project::create([
                 'name' => $request->input('name'),
                 'description' => $request->input('description'),
                 'image'=>$imgName,
                 'company_id' => $request->input('company_id'),
                 'user_id' => Auth::user()->id
             ]);



             if($project){
                 return redirect()->route('projects.show', ['project'=> $project->id])
                 ->with('success' , 'project created successfully');
             }

         }

             return back()->withInput()->with('errors', 'Error creating new project');

     }



     /**
      * Display the specified resource.
      *
      * @param  \App\project  $project
      * @return \Illuminate\Http\Response
      */
     public function show(Project $project)
     {
         //

        // $project = Project::where('id', $project->id )->first();
        $project = Project::find($project->id);

        $comments=Comment::where('commentable_id',$project->id)->get();
$users=User::all();
         return view('projects.show', ['project'=>$project, 'comments'=> $comments,'users'=>$users ]);
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\project  $project
      * @return \Illuminate\Http\Response
      */
     public function edit(Project $project,Request $request)
     {
         //
         $project = Project::find($project->id);

         return view('projects.edit', ['project'=>$project]);



     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\project  $project
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Project $project)
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
                    $img->save(public_path('pro_imgs/'.$imgName),60);




       $projectUpdate = Project::where('id', $project->id)
                                 ->update([
                                         'name'=> $request->input('name'),
                                         'description'=> $request->input('description'),
                                         'image'=>$imgName,
                                         'company_id' => $request->input('company_id'),
                                         'user_id' => Auth::user()->id
                                 ]);

       if($projectUpdate){
           return redirect()->route('projects.show', ['project'=> $project->id])
           ->with('success' , 'project updated successfully');
       }
       //redirect
       return back()->withInput();



     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\project  $project
      * @return \Illuminate\Http\Response
      */
     public function destroy(Project $project ,$id)
     {
         //

         $findproject = Project::find( $id);
         if($findproject->delete()){

             //redirect
             return redirect()->route('projects.index')
             ->with('success' , 'project deleted successfully');
         }

         return back()->withInput()->with('error' , 'project could not be deleted');


     }
}
