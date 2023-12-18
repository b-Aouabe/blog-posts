

<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, "allPosts"])->name('posts');

Route::get('/posts/{post}', [PostController::class, "onePost"]);



Route::get('register', [RegisterController::class, "create"])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store']);


Route::get('login', [SessionsController::class, "create"])->name('login')->middleware('guest');
Route::post('login', [SessionsController::class, 'store']);
Route::post('logout', [SessionsController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/posts/admin/create', [PostController::class, 'create'])->middleware('admin');

Route::post('posts/{post}/comments', [CommentController::class, 'store'])->middleware('auth');

//we replace the code below with a filter by category and pass the slug in the url:

// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('posts', [
//         'posts'=> $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// });

//we replaced also this code with a filter by author and pass the slug in the url:

// Route::get('/authors/{author:username}', function(User $author){
//     return view('posts.allPosts', [
//         'posts'=> $author->posts,
//     ]);
// });
