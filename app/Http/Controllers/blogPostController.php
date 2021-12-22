<?php

namespace App\Http\Controllers;

use App\Models\blog_post;
use Illuminate\Http\Request;

class blogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog_post  $blog_post
     * @return \Illuminate\Http\Response
     */
    public function show( blog_post $blog_post)
    {   

        $data = $blog_post->findAll();
         //return $blog_post->findAll();
        return view('blog.welcome', ['data'=> $data]);
    }

    public function showById($id, blog_post $blog_post)
    {   
        $data =  $blog_post->findById($id);
        return view('blog.article', ['data'=> $data]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog_post  $blog_post
     * @return \Illuminate\Http\Response
     */
    public function edit(blog_post $blog_post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog_post  $blog_post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog_post $blog_post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog_post  $blog_post
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog_post $blog_post)
    {
        //
    }
}
