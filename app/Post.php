<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'cover',
        'content',
        'slug',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public static function getPostSlug($title) {
        $base_slug = Str::slug($title, '-');
        $slug = $base_slug;
        $count = 1;
        $post_found = Post::where('slug', '=', $slug)->first();
        while ($post_found) { 
            $slug = $base_slug . '-' . $count;
            $post_found = Post::where('slug', '=', $slug)->first();
            $count++; 
        }
    
        return $slug;
    }


}

