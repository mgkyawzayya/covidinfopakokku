<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mtownsend\ReadTime\ReadTime;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        $id = 1;
        return view('blogs.index', compact('blogs'))->with('id', $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required'
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->category = $request->category;
        $blog->descriptions = $request->description;
        $blog->author_id = $request->user()->id;
        $blog->slug = Str::slug($blog->title);
        if ($request->link) {
            $blog->link = $request->link;
        }
        $blog->save();
        return redirect()->back()->with('message', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }

    public function home()
    {
        $blogs = Blog::paginate(5);
        return view('blog', compact('blogs'));
    }

    public function details($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('blog-details', compact('blog'));
    }
}
