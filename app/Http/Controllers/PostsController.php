<?php

namespace App\Http\Controllers;

use App\Post;
use App\File;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = [
            'name' => 'news', 
            'name' => 'post'
        ];
        return view('admin.posts.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $post = new Post();
        $post->title = $input['title'];
        $post->desc = $input['desc'];
        $post->type = $input['type'];

        $post->save();

        $files = $request->file('files');

        if($request->hasFile('files'))
        {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('images',  $name);

                $post->files()->save(new File(['filename' => $name]));
            }
        }

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->type = $request->type;
        $post->save();

        $files = $request->file('files');

        if($request->hasFile('files'))
        {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('images',  $name);

                $post->files()->save(new File(['filename' => $name]));
            }
        }

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route('posts.index'));
    }
}
