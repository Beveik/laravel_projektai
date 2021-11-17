<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use PDF;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $shops=Shop::all();
        $products=Product::all();
        $categories=Category::query()->sortable()->orderBy( 'id', 'asc')->paginate(15);
        return view("category.index", ["categories"=>$categories, "products"=>$products, "shops"=>$shops, "category"=>$category]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops=Shop::all()->sortBy('title', SORT_REGULAR, false);
        return view("category.create", ['shops' => $shops]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $shops=Shop::all()->sortBy('title', SORT_REGULAR, true);
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
        $shops=Shop::all()->sortBy('title', SORT_REGULAR, false);
        return view("category.edit", ["category"=> $category, "shops"=> $shops]);
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
    public function search(Request $request, Category $category) {
        // $paginationSettings=PaginationSetting::all();
        $categories=Category::all();
        $shops=Shop::all();
      $search = $request->search;
$categoryfilter=$request->category_shop_id;
// $message="";
// $pagination = $request->pagination;
// $category_count = $categories -> count();

// if ($pagination==1) {
//     $pagination=$task_count;
// }
//     if (isset($pagination)  && isset($typefilter) && $typefilter!=404 ){
// $tasks = Task::sortable()->where('type_id', $typefilter)->paginate($pagination);
//     } else if ($typefilter==404){
//         $tasks = Task::orderBy( 'id', 'asc')->paginate($pagination);
//     }
if (isset($categoryfilter) && $categoryfilter!=404 ){
    $categories = Category::sortable()->where('shop_id', $categoryfilter)->paginate(15);
        } else if ($categoryfilter==404){
            $categories = Category::orderBy( 'id', 'asc')->paginate(15);
        }
 if (isset($search) && !empty($search)){
    // $categories = Category::query()->sortable()->where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->paginate(15);
    $categories = Category::query()->sortable()->join('shops','categories.shop_id','shops.id')
    ->where('categories.title', 'LIKE', "%{$search}%")
    ->orWhere('shops.title', 'LIKE', "%{$search}%")
    ->paginate(15);
 } elseif (empty($search)) {
    $categories = Category::orderBy( 'id', 'asc')->paginate(15);
    // return view("category.search",['categories'=> $categories,'category'=> $category, 'shops'=> $shops])->with('danger_message','Search is empty.');
    // $message="with('danger_message','Search is empty.')";
 }
    // }
        return view("category.search",['categories'=> $categories,'category'=> $category, 'shops'=> $shops]);
    }

}
