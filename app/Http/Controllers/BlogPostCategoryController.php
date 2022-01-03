<?php

namespace App\Http\Controllers;

use App\Models\blog_post;
use App\Models\blog_post_category;
use Illuminate\Http\Request;

class BlogPostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $blog_post_category;
    // public function __construct()
    // {
    //     $this->blog_post_category = new blog_post_category();
    // }
    // public function index()
    // {
    //     return $this->blog_post_category->findAll();
    // }

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
    public function store($id, Request $request)
    {
        if (is_array($request->input('category'))) {
            foreach ($request->input('category') as $category_item) {
                $bpcModel = new blog_post_category([
                    'category_id' => $category_item,
                    'blog_post_id' => $id,
                    'created_at' => time(),
                    'updated_at' => time()
                ]);
                $bpcModel->save();
            }
        } else {
            $bpcModel = new blog_post_category([
                'category_id' => $request->input('category'),
                'blog_post_id' => $id,
                'created_at' => time(),
                'updated_at' => time()
            ]);
            $bpcModel->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog_post_category  $blog_post_category
     * @return \Illuminate\Http\Response
     */
    public function show(blog_post_category $blog_post_category)
    {
        return $blog_post_category->FindAll();
    }

    public function showByIdCategory($id, blog_post_category $blog_post_category)
    {
        $data = array(
            'blog_post_id' => $id
        );
        return $blog_post_category->FindById($data);
    }

    public function sortBlogPostByCategory($id){
        $data = array(
            'category_id' => $id
        );
        $bpcModel = new blog_post_category();
        $bpcId = $bpcModel->FindById($data);
        $bpModel = new blog_post();
        $bpData = $bpModel->findAll();
        return view('blog.welcome', [
            'bpcData'=>$bpcId,
            'data' =>$bpData,
            'cData' =>$this->CategoryData
            ]) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog_post_category  $blog_post_category
     * @return \Illuminate\Http\Response
     */
    public function edit(blog_post_category $blog_post_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog_post_category  $blog_post_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog_post_category $blog_post_category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog_post_category  $blog_post_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog_post_category $blog_post_category)
    {
        //
    }
}
