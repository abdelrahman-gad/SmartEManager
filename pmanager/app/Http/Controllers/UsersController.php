<?php

namespace App\Http\Controllers;
use App\Company;
use App\Project;
use App\Task;
use App\Comment;
use  App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use File;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

  $users=User::All();
 return view('users.index',['users'=>$users]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
      return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



      $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'password' => 'required|max:255'
            ]);
            $user =User::create([
              'name'=>$request->name,
              'email'=>$request->email,
              'password'=>bcrypt($request['password'])
            ]);



if ($user) {
return redirect('/users')->with('success','You have added  new user successfully');
}else
{
 return redirect()->back()->with('error','Error Adding new user');
}



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,$id )
    {
    $user=$user->find($id);
    $companies=Company::where('user_id',$id)->get();
    $projects=Project::where('user_id',$id)->get();
    $tasks=Task::where('user_id',$id)->get();
    $comments=Comment::where('user_id',$id)->get();

return view('users.show',['user'=>$user,'companies'=>$companies,'projects'=>$projects,'tasks'=>$tasks,'comments'=>$comments]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,$id)
    {
        $user=$user->find($id);

        return view('users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
$userUpdate=$user->find($user->id);

      if($request->file('image'))
      {
        $fileName=$request->file('image')->getClientOriginalName();

        $request->file('image')->move( base_path().'/public/user_imgs/',$fileName);
      // array_only($request->all(),
      $userUpdate->fill(['image'=>$fileName])->save();
      }







 $userUpdate=$user->where('id',$user->id)->update(
   [
     'name'=>$request->name,
     'email'=>$request->email,

     'job_title'=>$request->job_title,

     'bio'=>$request->bio,
     'dob'=>$request->dob


]
 );

if ($userUpdate) {
  return redirect()->route('users.index')->with('success','Users Had been Editted Successfully');
}else {
  return redirectWithInput('error','Error Editing User');
}


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user,$id)
    {
$user=$user->find($id);

if ($user->delete()) {
  return redirect()->back()->with('success','User Deleting successfully');
}else
{
  return back()->withInput()->with('error','Error users deleting  ');
}



    }
}
