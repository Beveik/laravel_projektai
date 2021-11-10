<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $categories=Category::all();
        $shops=Shop::query()->sortable()->orderBy( 'id', 'asc')->paginate(15);
        return view("shop.index", ["shops"=>$shops, "category"=>$category, "categories"=>$categories]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("shop.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop= new Shop;
        $shop->title = $request->shop_title;
        $shop->description = $request->shop_description;
        $shop->email = $request->shop_email;
        $shop->phone = $request->shop_phone;
        $shop->country = $request->shop_country;

        $shop ->save(); //insert į duomenų bazę
        return redirect()->route("shop.index")->with('success_message','Shop is added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        $categories = $shop->ShopCategories;
        $categories_count = $categories->count();
        return view('shop.show', ['shop' => $shop, "categories"=> $categories, "categories_count" => $categories_count]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        return view("shop.edit", ["shop"=> $shop]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        $shop->title = $request->shop_name;
        $shop->description = $request->shop_description;
        $shop->email = $request->shop_email;
        $shop->phone = $request->shop_phone;
        $shop->country = $request->shop_country;

        $shop ->save(); //insert į duomenų bazę
        return redirect()->route("shop.index")->with('success_message','Shop is updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shop_count=$shop->ShopCategories->count();

        if ($shop_count==0) {
        $shop->delete();
        // return redirect()->route("type.index");
        return redirect()->route("shop.index")->with('success_message','Shop is deleted.');
    } else {
        return redirect()->route("shop.index")->with('danger_message','Shop has books.');
    }

    }
    public function generatePDF() {

        //1. Pasiimti visus duomenis x
        // 2. kazkokiu panaudoti pdf biblioteka
        // 3. sugeneruoti atsisiuntimo nuoroda

        $shops = Shop::all();

        view()->share('shops', $shops);

        $pdf = PDF::loadView('pdf_template_shops', $shops);

        return $pdf->download('shops.pdf');
    }
    public function generateShop(Shop $shop)
    {
        $categories = $shop->ShopCategories; //dėl skaičiavimo
        view()->share('shop', $shop, 'categories', $categories );

        $pdf = PDF::loadView("pdf_template_shop", ['shop'=>$shop, 'categories'=>$categories]);
        return $pdf->download("shop".$shop->id.".pdf");

    }
}
