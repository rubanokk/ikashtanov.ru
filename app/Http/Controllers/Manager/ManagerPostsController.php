<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ManagerPostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return ['posts' => $posts];
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $data = $request->all();
        $post = Post::create($data);

        return ['post' => $post];
    }

    public function show(Post $post)
    {
        // if (!$post->published && !$this->authorize('update', $post)->allowed()) {
        //     abort(404);
        // }
        
        $categories = Category::all();
        $media = $post->getMedia('post-preview');
        $preview = null;
        
        if (count($media)) {
            $preview = [ 'id' => $media[0]->id, 'url' => $media[0]->getUrl('small') ];
        }

        return [
            'post' => $post, 
            'categories' => $categories, 
            'preview' => $preview
        ];
    }

    public function update(Request $request, Post $post)
    {
        // $this->authorize('update', $post);

        // $request->validate([
        //     'title' => 'required|max:255'
        // ]);

        if ($post) {
            $post->update($request->input('post'));
        }

        $categoriesIds = $request->input('categoriesIds');

        $post->categories()->sync($categoriesIds);

        return $post;
    }

    public function destroy(Post $post)
    {
        $post->delete();
    }

    public function upload_preview(Post $post, Request $request)
    {
        $media = $post
            ->addMedia($request->preview)
            ->usingFileName($request->preview->hashName())
            ->toMediaCollection('post-preview');

        return ['id' => $media->id, 'url' => $media->getUrl('small')];
    }

    public function destroy_preview(int $mediaId)
    {
        Media::find($mediaId)->delete();
    }

    public function upload_content_image(Post $post, Request $request)
    {
        $media = $post
            ->addMedia($request->image)
            ->usingFileName($request->image->hashName())
            ->toMediaCollection('post-content');

        return ['id' => $media->id, 'url' => $media->getUrl('big')];
    }

    public function destroy_content_image(int $mediaId)
    {
        Media::find($mediaId)->delete();
    }
}
