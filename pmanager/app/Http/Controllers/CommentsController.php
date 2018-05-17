<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Company;
use App\Project;
use App\Task;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

         //

         if(Auth::check()){
            $comment = Comment::create([
                'body' => $request->input('body'),
                'image' => $request->input('image'),
                'commentable_type' => $request->input('commentable_type'),
                'commentable_id' => $request->input('commentable_id'),
                'user_id' => Auth::user()->id
            ]);


            if($comment){
                return back()->with('success' , 'Comment created successfully');
            }

        }

            return back()->withInput()->with('errors', 'Error creating new comment');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment,$id)
    {
      // find the comment and redirect to object(Company,project,task) which is commented on
$comment=Comment::find($id);


if($comment->commentable_type=='company')
{
$company=Company::where('id',$comment->commentable_id);
return view('companies.show',['company'=>$company]);
}
elseif ($comment->commentable_type=='project') {

  $project=Project::where('id',$comment->commentable_id);

    return view('projects.show',['project'=>$project]);

}
else
{
  $task=task::where('id',$comment->commentable_id);

 return view('tasks.show',['task'=>$task]);

}




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment ,$id)
    {
$comment =Comment::find($id);

return redirect()->back('edit','comment');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment ,$id)
    {
$comment=Comment::find($id);

$comment->delete();
return redirect()->back()->with('success','comment had been deleted successfully');


    }
}
