<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Validator;
use Illuminate\Http\Request;
use DB;

class ClientController extends Controller
{
    public function index(){
//        DB::enableQueryLog();
        $categories = Category::all();
        $categories->load("posts");
//        dd(DB::getQueryLog());
        foreach ($categories as $category) {
            $category->posts->load("user");
        }
        return view('client.home', compact("categories"));
    }

    public function postsByCategory($id, Request $request) {
        $category = Category::find($id);
        $posts = Post::where("category_id", $id)->paginate(9);
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
            "last_name" => "required",
            "email" => "required"
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {

        }
        $user = User::find($id);

        return back();
    }
}
