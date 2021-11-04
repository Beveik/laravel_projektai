<?php

namespace App\Http\Controllers;

use App\Models\PaginationSetting;
use Illuminate\Http\Request;

class PaginationSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PaginationSetting $paginationSetting)
    {
        $paginationSettings=PaginationSetting::all();
        // $settingVisible=$paginationSetting->visible;
        // $paginationVisible="kazkas";

        return view("paginationsetting.index", ["paginationSetting"=>$paginationSetting, "paginationSettings"=>$paginationSettings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("paginationsetting.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validateVar = $request->validate([


                'paginationSetting_title' => 'required|min:1|max:225|regex:/^[a-zA-Z0-9]+$/u',// a-z A-Z 0-9
                'paginationSetting_value' => 'required|numeric|integer|gte:1',
                // 'paginationSetting_visible' => 'boolean',
                // 'paginationSetting_visible' => 'numeric|integer|min:0|max:1',

        ]);

            $paginationSetting= new PaginationSetting;
            $paginationSetting->title = $request->paginationSetting_title;
            $paginationSetting->value = $request->paginationSetting_value;
            $paginationSetting->visible = $request->paginationSetting_visible;

            if (isset($paginationSetting->visible)) {
                $paginationSetting->visible = 1;
            } else {
                $paginationSetting->visible = 0;
            }

            $paginationSetting ->save(); //insert į duomenų bazę
            return redirect()->route("paginationsetting.index")->with('success_message','Pagination setting is added.');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function show(PaginationSetting $paginationSetting)
    {
        $settingVisible=$paginationSetting->visible;
        $paginationVisible="No";

        if ($settingVisible==1){
            $paginationVisible="Yes";
        } else if ($settingVisible==0) {
            $paginationVisible="No";
        }
        return view('paginationsetting.show', ['paginationSetting' => $paginationSetting, "settingVisible"=>$settingVisible,  "paginationVisible"=>$paginationVisible]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(PaginationSetting $paginationSetting)
    {
       return view("paginationsetting.edit", ["paginationSetting"=>$paginationSetting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaginationSetting $paginationSetting)
    {

            $paginationSetting->title = $request->paginationSetting_title;
            $paginationSetting->value = $request->paginationSetting_value;
            $paginationSetting->visible = $request->paginationSetting_visible;

if (isset($paginationSetting->visible)) {
    $paginationSetting->visible = 1;
} else {
    $paginationSetting->visible = 0;
}
            $paginationSetting ->save(); //insert į duomenų bazę
            return redirect()->route("paginationsetting.index")->with('success_message','Pagination setting is updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaginationSetting $paginationSetting)
    {
        $paginationSetting->delete();
        // return redirect()->route("type.index");
        return redirect()->route("paginationsetting.index")->with('success_message','Pagination setting is deleted.');

    }
}
