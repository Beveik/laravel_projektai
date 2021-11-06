<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use App\Models\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products=Product::all();
        $categories=Category::all();
        $products = Product::query()->sortable()->orderBy( 'id', 'asc')->paginate(15);
         return view('product.index', ['products' => $products, 'categories'=>$categories]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all()->sortBy('title', SORT_REGULAR, true);


        return view("product.create", ["categories"=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories=Category::all()->sortBy('title', SORT_REGULAR, true);
        $product= new Product;

        $product->title = $request->product_title;
        $product->excerpt = $request->product_excerpt;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->image = $request->product_image;
        $product->category_id = $request->product_categoryid;
        $product ->save();
            // return redirect()->route("task.index");
            return redirect()->route("product.index", ["categories"=>$categories])->with('success_message','Product is created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories=Category::all()->sortBy('title', SORT_REGULAR, true);
        return view('product.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $categories=Category::all()->sortBy('title', SORT_REGULAR, true);
        $product->title = $request->product_title;
        $product->excerpt = $request->product_excerpt;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->image = $request->product_image;
        $product->category_id = $request->product_categoryid;
        $product ->save();
            // return redirect()->route("task.index");
            return redirect()->route("product.index", ["categories"=>$categories])->with('success_message','Product is updated.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("product.index")->with('success_message','Product is deleted successfully.');

    }
    public function generatePDF(Category $category) {

        //1. Pasiimti visus duomenis x
        // 2. kazkokiu panaudoti pdf biblioteka
        // 3. sugeneruoti atsisiuntimo nuoroda

        $products = Product::all();
        // $books_count = $author->AuthorBooks;
        view()->share('products', $products,  'category', $category);

        $pdf = PDF::loadView('pdf_template_products', $products);

        return $pdf->download('products.pdf');
    }
    public function generateProduct(Product $product)
    {
        view()->share('product', $product);

        $pdf = PDF::loadView("pdf_template_product", $product);
        return $pdf->download("product".$product->id.".pdf");

    }
}
