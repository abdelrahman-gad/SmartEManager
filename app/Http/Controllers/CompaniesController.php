<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;
class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::check()){
            $companies=Company::where('user_id',Auth::user()->id)->get();
            return view('companies.index',['companies'=>$companies]);

        }
       return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



       return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
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
  $img->resize(500,null,function($ratio)
  {
    $ratio->aspectRatio();
  });
  // save the image in the directory which i need
        $img->save(public_path('com_imgs/'.$imgName),60);





         if(Auth::check()){
             $company = Company::create([
                 'name' => $request->input('name'),
                 'description' => $request->input('description'),
                 'image'=>$imgName,//saving the img
                 'user_id' => Auth::user()->id
             ]);


             if($company){
                 return redirect()->route('companies.show', ['company'=> $company->id])
                 ->with('success' , 'Company created successfully');
             }
 return back()->withInput()->with('errors', 'Error creating new company');

         }


     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
    $company=Company::find($company->id);
// this variable will be catched in comments blade and according to it the from input will be for companies projects or tasks
$commentable_type ='company';

return view('companies.show', ['company'=>$company] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company=Company::find($company->id);

        return view('companies.edit', ['company'=>$company] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
      //save data
    // catch the image from the input and put in a variable
   $company=  Company::find($id);

      $img=  Image::make($request->file('image'));

      //get the name of image to use it again storing in database

      $imgName=$request->file('image')->getClientOriginalName();



      // modifing and customize my image (resizing , archiving)
      $img->resize(500,null,function($ratio)
      {
      $ratio->aspectRatio();
      });
      // save the image in the directory which i need
          $img->save(public_path('com_imgs/'.$imgName),60);







      $companyUpdate = Company::where('id', $company->id)
      ->update([
              'name'=> $request->input('name'),
              'description'=> $request->input('description'),
              'image'=>$imgName
      ]);

        if($companyUpdate){
        return redirect()->route('companies.show', ['company'=> $company->id])
        ->with('success' , 'Company updated successfully');
        }

        return redirect()->back()->withInput();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
      $findCompany=Company::find($company->id);
      if( $findCompany->delete())
      {
          return redirect()->route('companies.index')->with('success','company was deleted successfully');
      }
     return back()->withInput()->with('error','Company deleting error ');

    }
}
