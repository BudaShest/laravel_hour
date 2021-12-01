<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $categories = Category::orderBy('title')->get();
        $posts = Post::paginate(4);
        return view('pages.index',[
            "posts"=>$posts,
            "categories"=>$categories,
        ]);
    }

    public function getPostsByCategory($slug){
        $categories = Category::orderBy('title')->get();
        $currentCategory = Category::where('slug', $slug)->first();

        return view('pages.index',[
            "posts"=>$currentCategory->posts()->paginate(4),
            "categories"=>$categories,
        ]);
    }

    public function getPost($slugCategory, $slugPost){
        $post = Post::where('slug',$slugPost)->first();
        $categories = Category::orderBy('title')->get();

        return view('pages.showPost',[
            "post"=>$post,
            "categories"=>$categories,
        ]);
    }
}
