<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        $post_with_categories = [];
        foreach ($posts as $post) {
            $category = $post->category;
            $post['category'] = $category;
            $post_with_categories[] = $post;
        }
        foreach ($posts as $post) {
            if($post->cover) {
                $post->cover = url('storage/' . $post->cover);
            }
        }
        return response()->json([
            'success' => true,
            'result' => $posts
        ]);
    }

    public function show($slug) {
        $post = Post::where('slug', '=', $slug)->with(['category', 'tags'])->first();
        if ($post) { 
            if($post->cover) {
                $post->cover = url('storage/' . $post->cover);
            }

            return response()->json([
                'success' => true,
                'results' => $post
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'nessun post trovato'
        ]);
    }
}
 