<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 
use DB;
use Session;
session_start();

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_id=Session::get('admin_id');
      if ($admin_id == NULL) {
          return Redirect::to('/backend')->send();
      }
      $dashboard_content=view('admin.pages.dashboard_content');
       return view('admin.admin_master')
                  ->with('admin_content',$dashboard_content);
        
    }
    
//category page are here
    public function add_category(){

         $add_category_content=view('admin.pages.add_category');
       return view('admin.admin_master')
                  ->with('admin_content',$add_category_content);
    }
//manage category are here
    public function manage_category(){
      $category_info=DB::table('tbl_category')->get();
        
      $manage_category=view('admin.pages.manage_category')
                      ->with('all_category_info',$category_info);
      return view('admin.admin_master')
                 ->with('admin_content',$manage_category);
    }
//category unpublished_category value change

    public function unpublished_category($category_id){
       
       DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update(['publication_status' => 0]);   
         return Redirect::to('/manage-category');
    }

//Category published are here
    public function published_category($category_id){
       
       DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update(['publication_status' => 1]);   
         return Redirect::to('/manage-category');
    }

//category inserted query
   public function save_category(Request $request){
       $data = array();
       $data['category_name']=$request->category_name;
       $data['category_description']=$request->category_description;
       $data['publication_status']=$request->publication_status;

       DB::table('tbl_category')->insert($data);
       Session::put('message','Category Inserted Successfully!!');
       return Redirect::to('/add-category');
   }

//category deleted are here....
   public function delete_category($category_id){
 
    DB::table('tbl_category')
             ->where('category_id',$category_id)
             ->delete();
             return Redirect::to('/manage-category');
   } 

 //edit category are here
   public function edit_category($category_id){
    $category_info=DB::table('tbl_category')
                   ->where('category_id',$category_id)
                   ->first();
         $edit_category=view('admin.pages.edit_category')  
                         ->with('category_info',$category_info);    
      return view('admin.admin_master')->with('admin_content',$edit_category);
    }

//update category are here
    public function update_category(Request $request){
       $data = array();
       $category_id=$request->category_id;
       $data['category_name']=$request->category_name;
       $data['category_description']=$request->category_description;

//$data['publication_status']=$request->publication_status;
       DB::table('tbl_category')
         ->where('category_id',$category_id)
         ->update($data);

       Session::put('message','Category update Successfully!!');
       return Redirect::to('/edit-category/'.$category_id);
   }


//logout function are here

     public function logout()
    {
       Session::put('admin_name',null);
       Session::put('admin_id',null);
       Session::put('message','You are successfully logout');
       return Redirect::to('/backend');
        
    }
//add blog form are here
   public function add_blog(){
     
     $category_info=DB::table('tbl_category')
                   ->where('publication_status',1)
                   ->get();
     $add_blog=view('admin.pages.add_blog')
               ->with('category_info',$category_info);

     return view('admin.admin_master')
              ->with('admin_content',$add_blog);
   } 
//add blog enter are here thats mean save blog oe new blog ADD

public function save_blog(Request $request){
    $data=array();
    $data['blog_title']=$request->blog_title;
    $data['category_id']=$request->category_id;
    $data['blog_short_description']=$request->blog_short_description;
    $data['blog_long_description']=$request->blog_long_description;
    $data['publication_status']=$request->publication_status;
    $image=$request->file('blog_image');
    if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='blog_images/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);
       if ($success) {
         $data['blog_image']=$image_url;
            DB::table('tbl_blog')->insert($data);
            Session::put('message','blog insert successfully!!');
            return Redirect::to('/add-blog');
       }
    }
    $data['blog_image']=$image_url;
            DB::table('tbl_blog')->insert($data);
            Session::put('message','blog insert successfully!!');
            return Redirect::to('/add-blog');

}      
//manage blogs section are here thats means all blogs are here

public function manage_blog(){
      $blog_info=DB::table('tbl_blog')->get();
        
      $manage_blog=view('admin.pages.manage_blog')
                      ->with('all_blog_info',$blog_info);
      return view('admin.admin_master')
                 ->with('admin_content',$manage_blog);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
