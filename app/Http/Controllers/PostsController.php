<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::where('published', '=', true)
                    ->orderBy('created_at', 'DESC')
                    ->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function category(Category $category)
    {
        $posts = Post::whereHas('categories', function ($query) use($category) {
            $query->where('category_id', '=', $category->id);
        })->get();
        return view('home.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        $posts = Post::where('id', '!=', $post->id)
                ->limit(2)        
                ->get();

        $expiresAt = now()->addHours(3);
        views($post)
            ->cooldown($expiresAt)
            ->record();
        return view('posts.show', compact('post', 'posts'));
    }
}
