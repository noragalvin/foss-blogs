<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
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
}
