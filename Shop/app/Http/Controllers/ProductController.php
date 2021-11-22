<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use PDF;
use App\Models\Shop;
use Illuminate\Http\Request;
use Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Product $product)
    {

        $categories = Category::all();
        $products = Product::query()->sortable()->orderBy('id', 'asc')->paginate(15);

        // $filterpdf=$request->product_category_id;
        // $searchpdf=$request->search;
        // $max=Product::max('price');
        // $min=Product::min('price');
        $productfilter = $request->product_category_id;

        if (isset($productfilter) && $productfilter != 404) {
            $products = Product::query()->sortable()->where('category_id', $productfilter)->paginate(15);
        } elseif ($productfilter == 404) {
            $products = Product::query()->sortable()->orderBy('id', 'asc')->paginate(15);
        }
        return view('product.index', ['products' => $products, 'product' => $product, 'categories' => $categories, 'productfilter' => $productfilter, 'filterpdf' => $productfilter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->sortBy('title', SORT_REGULAR, true);


        return view("product.create", ["categories" => $categories]);
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
        // $product= new Product;

        // $product->title = $request->product_title;
        // $product->excerpt = $request->product_excerpt;
        // $product->description = $request->product_description;
        // $product->price = $request->product_price;
        // $product->image = $request->product_image;
        // $product->category_id = $request->product_categoryid;
        // $product ->save();
        // return redirect()->route("task.index");
        // return redirect()->route("product.index", ["categories"=>$categories])->with('success_message','Product is created.');
        // $productsNew = $request->productsNew;
        $category_count=$categories->count();
        $input = [
            'productTitle' => $request->productTitle,
            'productExcerpt' => $request->productExcerpt,
            'productDescription' => $request->productDescription,
            'productPrice' => $request->productPrice,
            'productImage' => $request->productImage,
            'productCategoryId' => $request->productCategoryId,
        ];

        $rules = [
            'productTitle' => 'required|min:3',
            'productExcerpt' => 'required|min:3',
            'productDescription' => 'min:8',
            // 'productPrice' => 'regex:\d{1,3}(?:[.]\d{3})*(?:[.]\d{2})',
            // 'productImage' => 'image',
            'productCategoryId' => 'numeric|integer|lte:'.$category_count,
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->passes()) {
            $product = new Product;
            $product->title = $request->productTitle;
            $product->excerpt = $request->productExcerpt;
            $product->description = $request->productDescription;
            $product->price = $request->productPrice;
            $product->image = $request->productImage;
            $product->category_id = $request->productCategoryId;
            $product->save();

            $success = [
                'message' => '[Back-End] Product added successfully',
                'productID' => $product->id,
                'productTitle' => $product->title,
                'productExcerpt' => $product->excerpt,
                'productDescription' => $product->description,
                'productPrice' => $product->price,
                'productImage' => $product->image,
                'productCategoryId' => $product->category_id,
            ];

            $success_json = response()->json($success);

            return $success_json;
        }


        $error = [
            'error' => $validator->messages()->get("*")
        ];

        $error_json = response()->json($error);

        return $error_json;


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
        $categories = Category::all()->sortBy('title', SORT_REGULAR, true);
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
        $categories = Category::all()->sortBy('title', SORT_REGULAR, true);
        $product->title = $request->product_title;
        $product->excerpt = $request->product_excerpt;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->image = $request->product_image;
        $product->category_id = $request->product_categoryid;
        $product->save();

        return redirect()->route("product.index", ["categories" => $categories])->with('success_message', 'Product is updated.');
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
        return redirect()->route("product.index")->with('success_message', 'Product is deleted successfully.');
    }
    public function generatePDF(Request $request)
    {
        $categories = Category::all();
        $products = Product::all();

        $search = $request->search;

        $productfilter = $request->product_category_id;

        if (isset($productfilter) && $productfilter != 404) {
            $products = Product::query()->sortable()->where('category_id', $productfilter)->get();
        } elseif ($productfilter == 404) {
            $products = Product::query()->sortable()->orderBy('id', 'asc');
        }

        if (isset($search) && !empty($search)) {
            $products = Product::
                //    ->join('categories','products.category_id', 'categories.id')
                query()
                ->sortable()
                // ->select('products.title as productTitle','categories.title as categoryTitle')
                ->where('title', 'LIKE', "%{$search}%")
                // ->orWhere('categories.title', 'LIKE', "%{$search}%")
                ->get();
        } elseif (empty($search)) {
            $products = Product::query()->sortable()->orderBy('id', 'asc');
        }

        view()->share('products', $products,  'categories', $categories);

        $pdf = PDF::loadView('pdf_template_products', $products);

        return $pdf->download('products.pdf');
    }
    public function generateProduct(Product $product)
    {
        view()->share('product', $product);

        $pdf = PDF::loadView("pdf_template_product", $product);
        return $pdf->download("product" . $product->id . ".pdf");
    }
    public function search(Request $request, Product $product)
    {
        $categories = Category::all();
        $search = $request->search;
        if (isset($search) && !empty($search)) {
            $products = Product::
                //    ->join('categories','products.category_id', 'categories.id')
                query()
                ->sortable()
                // ->select('products.title as productTitle','categories.title as categoryTitle')
                ->where('title', 'LIKE', "%{$search}%")
                // ->orWhere('categories.title', 'LIKE', "%{$search}%")
                ->paginate(15);
        } elseif (empty($search)) {
            $products = Product::query()->sortable()->orderBy('id', 'asc')->paginate(15);
        }
        return view("product.search", ['categories' => $categories, 'product' => $product, 'products' => $products, 'searchpdf' => $search]);


        // return view("product.search",['categories'=> $categories,'product'=> $product, 'products'=> $products, 'max'=> $max, 'min'=> $min]);
    }

    public function validationcreate()
    {
        return view("product.validationcreate");
    }

    public function validationstore(Request $request)
    {


        $input = [

            'productTitle' => $request->productTitle,
            'productExcerpt' => $request->productExcerpt,
            'productDescription' => $request->productDescription,
            'productPrice' => $request->productPrice,
            'productImage' => $request->productImage,
            'productCategory' => $request->productCategory,
        ];

        $rules = [
            'productTitle' => 'required|alpha',
            'productPrice' => 'numeric|max:5'
        ];

        $messages = [
            'required' => "The name field is required",
            'alpha' => "Only letters"
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->passes()) {
            $success = [
                'success' => "The name validated successfully"
            ];
            $success_json = response()->json($success);
            return $success_json;
        }

        $error = [
            'error' => $validator->messages()->get("*")
        ];

        $error_json = response()->json($error);

        return $error_json;
    }
}
