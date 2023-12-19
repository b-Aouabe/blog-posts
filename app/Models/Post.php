<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

     protected $guarded = [];
    // protected $fillable = ['title', 'excerpt', 'body'];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters){


        //------search filter-------------
        // if($filters["search"] ?? false)
            // $query
            //    ->where("title", "like", "%". request("search"). "%")
            //     ->orWhere("body", "like", "%". request("search"). "%");

        //all this code above can be replaced with the `when` function that exists in the eloquent Builder
        $query->when($filters["search"] ?? false , fn($query, $search) =>
            $query->where(fn ($query) =>
                $query
                    ->where("title", "like", "%". $search. "%")
                    ->orWhere("body", "like", "%". $search. "%")
            )

    );

        //------category filter-------------
        $query->when($filters["category"] ?? false , fn($query, $categorySlug) =>

            $query->whereHas("category",fn($query)=>
                    $query->where('slug', $categorySlug)
                )
        );

        //------author filter-------------
        $query->when($filters["author"] ?? false , fn($query, $authorUsername) =>

            $query->whereHas("author",fn($query)=>
                    $query->where('username', $authorUsername)
                )
        );


    }

    //mutators;
    public function setTitleAttribute ($title) {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = str::slug($title);
    }

    //this method sets the default passed parameter to the slug instead pf the id
    public function getRoutekeyName () {
        return 'slug';
    }

    public function category () {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author () {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments () {
        return $this->hasMany(Comment::class);
    }
}
