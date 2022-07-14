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
        return response()->json([
            'success' => true,
            'result' => $posts
        ]);
    }
}
