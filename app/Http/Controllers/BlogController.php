<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all()->map(function ($blog) {
            $blog->image = $blog->image ? asset('storage/' . $blog->image) : null;
            return $blog;
        });

        return response()->json($blogs);
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $blog->image = $blog->image ? asset('storage/' . $blog->image) : null;

        return response()->json($blog);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'title' => 'required|string|max:255|unique:blogs',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($validated);

        return response()->json(['message' => 'Blog created successfully']);
    }
}
