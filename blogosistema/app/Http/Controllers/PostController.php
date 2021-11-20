<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Post $post)
    {
        $categories=Category::all();
        $posts = Post::query()->sortable()->orderBy( 'id', 'asc')->paginate(15);

$postfilter=$request->post_category_id;

if ( isset($postfilter) && $postfilter!=404 ){
    $posts = Post::query()->sortable()->where('category_id', $postfilter)->paginate(15);
        } elseif ($postfilter==404){
            $posts = Post::query()->sortable()->orderBy( 'id', 'asc')->paginate(15);
        }
         return view('post.index', ['posts' => $posts, 'post' => $post, 'categories'=>$categories, 'postfilter'=>$postfilter]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all()->sortBy('title', SORT_REGULAR, true);


        return view("post.create", ["categories"=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoryNew = $request->categoryNew;
        if($categoryNew == "1") { // koks kintamojo tipas ateina is checkbox jei jis pazymetas? 1 tekstas
            $category = new Category;
            $category->title =  $request->categoryTitle;
            $category->description = $request->categoryDescription;
            $category->excerpt = $request->categoryExcerpt;
            $category->save();

            $categoryId = $category->id;
        } else {
            $categoryId = $request->postCategory;
        }


        $post = new Post;

        $post->title = $request->postTitle;
        $post->author = $request->postAuthor;
        $post->description = $request->postDescription;
        $post->category_id = $categoryId;

        $post->save();

        return redirect()->route('post.index')->with('success_message','Post is added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories=Category::all()->sortBy('title', SORT_REGULAR, true);
        return view('post.edit', ['post' => $post, 'categories' => $categories]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("post.index");
    }
    public function destroyAjax(Post $post)
    {
        //1. IStriname klienta
        //2. Suskaiciuojame kiek klientu liko kompanijai
        //3. Likusiu klientu kieki perduodame i JSON zinute
        //4. Per Javascript, jei klientu kiekis ateina 0, remove() - table, append() - alert
        // id
        //name
        //surname
        //company_id

        $category_id = $post->category_id;

        $post->delete();

        $postsLeft = Post::where('category_id', $category_id)->get() ;//masyvas su visais klientais, priklausanciais kompanijai
        $posts_count = $postsLeft->count();

        //sekmes nesekmes zinute
        $success = [
            "success" => $post->title." deleted successfuly",
            "posts_count" => $posts_count
        ];
        $success_json = response()->json($success);

        return $success_json;
    }
}
