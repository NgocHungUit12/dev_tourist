<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\RedirectResponse;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $file = $request->file('image');
        $file_name = $file->getClientOriginalName();
        $file->move(base_path('uploads'), $file_name);

        $post = new Post();
        $post->title = $request['title'];
        $post->slug = Str::slug($request->title);
        $post->excerpt = $request['excerpt'];
        $post->content = $request['content'];
        $post->image = $file_name;
        $post->save();

        return redirect()->route('admin.posts.index')->with('message', 'Added Successfully !');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(StorePostRequest  $request, Post $post)
    {

        $file = $request->file('image');
        $file_name = $file->getClientOriginalName();
        $file->move(base_path('uploads'), $file_name);

        $post->title = $request['title'];
        $post->slug = Str::slug($request->title);
        $post->excerpt = $request['excerpt'];
        $post->content = $request['content'];
        $post->image = $file_name;
        $post->save();

        return redirect()->route('admin.posts.index')->with('message', 'Updated Successfully !');
    }

    public function destroy(Post $post)
    {
        if($post->image){
            File::delete('storage/' . $post->image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('message', 'Deleted  Successfully !');
    }
}
