<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Charts\SampleChart;
use Auth;
use Intervention\Image\Facades\Image as Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::orderBy('created_at', 'desc');
        if($request->search) {
            $posts = $posts->where('title', 'like', '%' . $request->search . '%')->orWhere('short_description', 'like', '%' . $request->search . '%');
        }
        $posts = $posts->paginate(10);
        $posts->load('user');
        $posts->load('category');
        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.posts.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "category_id" => 'required',
            "title" => "required",
            "content" => "required"
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post = new Post();
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->short_description = $request->short_description;
        $post->content = $request->content;
        if($request->hasFile('file'))
        {
            $avatar = $request->file('file');

            $filename = time().'.'.$avatar->getClientOriginalExtension();

            Image::make($avatar)->save(public_path('/uploads/posts/'.$filename));
            $post->image_url = '/uploads/posts/' . $filename;
        }
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            "category_id" => 'required',
            "title" => "required",
            "content" => "required"
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post = Post::find($id);
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->short_description = $request->short_description;
        $post->content = $request->content;
        if($request->hasFile('file'))
        {
            $avatar = $request->file('file');

            $filename = time().'.'.$avatar->getClientOriginalExtension();

            Image::make($avatar)->save(public_path('/uploads/posts/'.$filename));
            $post->image_url = '/uploads/posts/' . $filename;

        }
        $post->save();

        session()->flash("success", "Update Successfully");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        session()->flash("success", "Delete successfully");
        return back();
    }
}
