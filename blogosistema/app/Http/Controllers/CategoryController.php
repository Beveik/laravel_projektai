<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {

        $posts=Post::all();
        $categories=Category::query()->sortable()->orderBy( 'id', 'asc')->paginate(15);

        return view("category.index", ["categories"=>$categories, "posts"=>$posts, "category"=>$category]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts=Post::all()->sortBy('title', SORT_REGULAR, false);
        return view("category.create", ['posts' => $posts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $postsNew = $request->postsNew;
        $category = new Category;
        $category->title = $request->categoryTitle;
        $category->description = $request->categoryDescription;
        $category->excerpt = $request->categoryExcerpt;

        $category->save();

        $postsInputCount = count($request->postTitle);



        if($postsNew == "1") {

            for($i = 0 ; $i < $postsInputCount ; $i++) {
                $post = new Post;
                $post->title = $request->postTitle[$i];
                $post->author = $request->postAuthor[$i];
                $post->description = $request->postDescription[$i];
                $post->category_id = $category->id; //nuo jokio if'o nepriklauso
                $post->save();
            }
        }

        return redirect()->route("category.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = $category->CategoryPosts;
        $posts_count = $posts->count();
        return view('category.show', ['category' => $category, "posts"=> $posts, "posts_count" => $posts_count]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category_count=$category->CategoryPosts->count();

        if ($category_count==0) {
        $category->delete();
        return redirect()->route("category.index")->with('success_message','category is deleted.');
    } else {
        return redirect()->route("category.index")->with('danger_message','category has products.');
    }
    }
}
