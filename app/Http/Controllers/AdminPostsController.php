<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostscreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Support\Facades\Auth;


class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts=Post::all();

      return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::pluck('name','id')-> all();

        return view('admin.posts.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostscreateRequest $request)
    {
       $input=$request->all();

       $user=Auth::user();
       if ($file = $request->file('photo_id')){
           $name = time() . $file->getClientOriginalName();
           $file->move('images',$name);
           $photo = Photo::create(['file'=>$name]);

           $input['photo_id'] = $photo->id;
       }

       $user->posts()->create($input);
       return redirect('/admin/posts');
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
        $category=Category::pluck('name','id')-> all();
        $posts=Post::findOrFail($id);
        return view('admin.posts.edit',compact('category',$posts));

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
