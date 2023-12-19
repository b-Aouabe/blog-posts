<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function create () {
        return view('posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store () {
//        return "sotred into " . $path;

        //validate the request
        $attributes = request()->validate([
            'title' =>['required', Rule::unique('posts', 'title')], //
            'excerpt' =>['required'],//, Rule::unique('posts', 'excerpt')
            'thumbnail' =>['required', 'image'],
            'body' =>['required'],
            'category_id' =>['required', Rule::exists('categories', 'id')]
        ]);
        $path = request()->file('thumbnail')->store('thumbnails');

        //store the data
        Post::create([
            'category_id' => $attributes['category_id'],
            'user_id' => request()?->user()->id,
            'title' => $attributes['title'],
            'excerpt' => $attributes['excerpt'],
            'thumbnail' => $path,
            'body' => $attributes['body']

        ]);

        //redirect
        return redirect('/posts');

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
