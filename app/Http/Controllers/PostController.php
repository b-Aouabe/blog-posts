<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function create () {
        return view('posts.create');
    }

    public function allPosts(){
        //the filter method assumes that you've created a method name `scopeFilter` in wich you handle the filters

        return view('posts.allPosts', [
           // 'posts'=> Post::latest()->with('category', 'author')->get() //we replaced this with the $with property in the Post model
           'posts'=>  Post::latest()
                            ->filter(request(["search", "category", "author"]))
                            ->paginate(6), //6 items for a page
        ]);
    }

    public function onePost(Post $post){
        return view('posts.onePost', [
            'post'=> $post,
            'comments' => Comment::latest()->get()->where('post_id', $post->id)
        ]);
    }
}
