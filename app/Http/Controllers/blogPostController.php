<?php

namespace App\Http\Controllers;

use App\Models\blog_post;
use App\Models\blog_post_category;
use App\Models\category_type;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Factory;

class blogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function store(Request $request, Factory $validator)
    {

        $validation = $validator->make(
            $request->all(),
            [
                'title' => 'required|min:10',
                'description' => 'required|min:10',
                'content' => 'required|min:20',
                'img_link' => 'required|mimes:jpeg,jpg,png',
                'category' => 'required'
            ]
        );
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        $imageNewName = time() . '-' . strtok($request->title, " ") . '.' . $request->img_link->extension();
        $request->img_link->move(public_path('assets/images'), $imageNewName);

        $blog = new blog_post(
            [
                'content' => $request->input('content'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'img_link' => $imageNewName,
                'created_by' => 1,
            ]
        );

        $blog->save();

        $BPC = new BlogPostCategoryController();
        $BPC->store($blog->id, $request);

        return redirect()
            ->route('admin.blog-post')
            ->with('notif', 'new created Blog: ' . $request->input('title'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog_post  $blog_post
     * @return \Illuminate\Http\Response
     */
    public function show(blog_post $blog_post)
    {
        return view(
            'blog.welcome',
            ['data' =>  $blog_post->findAll()],
            ['cData' => $this->CategoryData]
        );
    }

    public function showById($id, blog_post $blog_post)
    {
        $data =  $blog_post->findById($id);
        $articleCategoryData = new blog_post_category();
        $bpcData = array(
            'blog_post_id' => $id
        );
        $blogCategoryData = $articleCategoryData->FindById($id);
        return view(
            'blog.article',
            [
                'data' => $data,
                'cData' => $this->CategoryData,
                'bcData' => $blogCategoryData
            ]
        );
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
