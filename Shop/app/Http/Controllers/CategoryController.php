<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        $categories=Category::query()->sortable()->orderBy( 'id', 'asc')->paginate(15);
        return view("category.index", ["categories"=>$categories,  "products"=>$products]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category= new Category;
        $category->title = $request->category_title;
        $category->description = $request->category_description;
        $category->shop_id = $request->category_shopid;
        $category ->save(); //insert į duomenų bazę
        return redirect()->route("category.index")->with('success_message','Category is added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $products = $category->CategoryProducts;
        $products_count = $products->count();
        return view('category.show', ['category' => $category, "products"=> $products, "products_count" => $products_count]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("category.edit", ["category"=> $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request->category_title;
        $category->description = $request->category_description;
        $category->shop_id = $request->category_shopid;
        $category ->save(); //insert į duomenų bazę
        return redirect()->route("category.index")->with('success_message','Category is updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category_count=$category->CategoryProducts->count();

        if ($category_count==0) {
        $category->delete();
        // return redirect()->route("type.index");
        return redirect()->route("category.index")->with('success_message','category is deleted.');
    } else {
        return redirect()->route("category.index")->with('danger_message','category has products.');
    }

    }
    public function generatePDF() {

        //1. Pasiimti visus duomenis x
        // 2. kazkokiu panaudoti pdf biblioteka
        // 3. sugeneruoti atsisiuntimo nuoroda

        $categories = Category::all();

        view()->share('categories', $categories);

        $pdf = PDF::loadView('pdf_template_categories', $categories);

        return $pdf->download('categories.pdf');
    }
    public function generateCategory(Category $category)
    {
        $products = $category->CategoryProducts;
        view()->share('category', $category, 'products', $products );

        $pdf = PDF::loadView("pdf_template_category", ['category'=>$category, 'products'=>$products]);
        return $pdf->download("category".$category->id.".pdf");

    }
}
