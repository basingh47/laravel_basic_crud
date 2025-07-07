<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postdata = Post::select('id', 'title', 'status', 'created_at')->get();
        return view('admin.pages.list-posts', compact('postdata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('category_name', 'id');

        return view('admin.pages.create-post', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('featuredImage')) {
            $file = $request->file('featuredImage');
            $filename = time() . '_' . uniqid() . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/posts', $filename, 'public');
            $data['featuredImage'] = 'storage/' . $path;
        }
        Post::create([
            'title' => $data['postTitle'],
            'image_path' => $data['featuredImage'] ?? null,
            'post_content' => $data['postContent'],
            'category_id' => $data['postCategory'],
            'status' => $data['postStatus'],
        ]);
        return redirect()->route('post.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('category_name', 'id');
        return view('admin.pages.edit-post', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'postTitle' => 'required|string|max:255',
            'postCategory' => 'required|exists:categories,id',
            'postTags' => 'nullable|string',
            'featuredImage' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'postContent' => 'required|string',
            'postStatus' => 'required|in:Draft,Publish,Scheduled',
        ]);

        $data = $request->all();

        if ($request->hasFile('featuredImage')) {
            $file = $request->file('featuredImage');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/posts', $filename, 'public');
            $data['featuredImage'] = 'storage/' . $path;
        }

        $post->update([
            'title' => $data['postTitle'],
            'image_path' => $data['featuredImage'] ?? $post->image_path,
            'post_content' => $data['postContent'],
            'category_id' => $data['postCategory'],
            'status' => $data['postStatus'],
        ]);

        return redirect()->route('post.index')->with('success', 'Post Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach(); // removes entries from post_tag table
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post Delete successfully!');
    }
}
