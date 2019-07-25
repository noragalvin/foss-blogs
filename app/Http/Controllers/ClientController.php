<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Validator;
use Illuminate\Http\Request;
use DB;
use Auth;
use Intervention\Image\Facades\Image as Image;

class ClientController extends Controller
{
    public function index(Request $request){
//        DB::enableQueryLog();
        $categories = Category::all();
        if($request->search) {
            $search = $request->search;
            $categories->load(['posts' => function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')->orWhere('short_description', 'like', '%' . $request->search . '%');
            }]);
        } else {
            $categories->load(['posts' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }]);
        }
//        dd(DB::getQueryLog());
        foreach ($categories as $category) {
            $category->posts->load("user");

        }
        return view('client.home', compact("categories"));
    }

    public function postsByCategory($id, Request $request) {
        $category = Category::find($id);
        $posts = Post::where("category_id", $id)->orderBy('created_at', 'desc');
        if($request->search) {
            $posts = $posts->where('title', 'like', '%' . $request->search . '%')->orWhere('short_description', 'like', '%' . $request->search . '%');
        }
        $posts = $posts->paginate(9);
        return view('client.category_posts', compact('category', 'posts'));
    }

    public function singlePost($id, Request $request) {
        $post = Post::find($id);
        $post->load('user');
        $post->load('category');
        $post->load('comments');
        return view('client.post', compact('post'));
    }

    public function profile($id, Request $request) {
        $user = User::find($id);
        return view('client.profile', compact('user'));
    }

    public function updateProfile($id, Request $request) {
        $rules = [
            "first_name" => 'required',
            "last_name" => "required"
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        if($request->password) {
            $user->password = bcrypt($request->password);
        }

        if($request->hasFile('file'))
        {
            $avatar = $request->file('file');

            $filename = time().'.'.$avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/users_avatars/'.$filename));
            $user->avatar_url = '/uploads/users_avatars/' . $filename;
        }

        $user->save();

        session()->flash("success", "Update Successfully");
        return back();
    }

    public function userPosts($id, Request $request) {
        $posts = Post::where("user_id", $id);
        if($request->search) {
            $posts = $posts->where('title', 'like', '%' . $request->search . '%')->orWhere('short_description', 'like', '%' . $request->search . '%');
        }
        $posts = $posts->paginate(9);
        $user = User::find($id);
        return view('client.user_posts', compact('user', 'posts'));
    }

    public function addPost(Request $request) {
        $categories = Category::all();
        return view('client.add_post', compact("categories"));
    }

    public function postPost(Request $request) {
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
        return redirect()->route('getUserPosts', Auth::user()->id);
    }
}
