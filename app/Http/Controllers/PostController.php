<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postdata = Post::select('id', 'title', 'status', 'created_at')->paginate(5);
        return view('admin.pages.post.posts-list', compact('postdata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('category_name', 'id');

        return view('admin.pages.post.create-post', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('featuredImage')) {
            $file = $request->file('featuredImage');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/posts', $filename, 'public');
            $data['featuredImage'] = 'storage/' . $path;
        }

        // Save post and capture the instance
        $post = Post::create([
            'title' => $data['postTitle'],
            'image_path' => $data['featuredImage'] ?? null,
            'post_content' => $data['postContent'],
            'category_id' => $data['postCategory'],
            'status' => $data['postStatus'],
        ]);

        // Handle tags
        if ($request->filled('postTags')) {
            $tags = explode(',', $request->input('postTags'));
            $tagIds = [];

            foreach ($tags as $tag) {
                $cleanTag = trim($tag);
                if ($cleanTag === '')
                    continue;

                $tagModel = Tag::firstOrCreate(['name' => $cleanTag]);
                $tagIds[] = $tagModel->id;
            }

            $post->tags()->attach($tagIds);
        }

        return redirect()->route('post.index')->with('success', 'Post created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.pages.post.post-view', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('category_name', 'id');
        $post->load('tags');  //Eager loads the tags relationship on an already-loaded post
        $tags = $post->tags->pluck('name')->implode(',');
        return view('admin.pages.post.edit-post', compact('post', 'categories', 'tags'));
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
            if ($post->image_path && Storage::disk('public')->exists(str_replace('storage/', '', $post->image_path))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $post->image_path));
            }
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

        if ($request->filled('postTags')) {
            $tags = explode(',', $request->input('postTags'));
            $tagIds = [];

            foreach ($tags as $tag) {
                $cleanTag = trim($tag);
                $tagModel = Tag::firstOrCreate(['name' => $cleanTag]);
                $tagIds[] = $tagModel->id;
            }
            $post->tags()->sync($tagIds);
        } else {
            $post->tags()->detach();
        }

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
