<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use Illuminate\Http\Request;
use Validator;
use App\Models\Article;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Type $type)
    {
        $articles = $type->typeArticles;
        $articlesCount = $articles->count();
        $types = Type::all();
        return view('type.index',[ 'types'=> $types, 'articles'=>$articles, 'articlesCount'=> $articlesCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("type.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        //
    }
    public function storeAjax(Request $request) {


        $type = new Type;

        $input = [
            'typeTitle' => $request->typeTitle,
            'typeDescription' => $request->typeDescription,
        ];//ka mes ivedama, laukeliu pavadinimai kuriuos validuosim
        $rules = [
            'typeTitle' => 'required|min:3',
            'typeDescription' => 'min:15',
        ]; //taisykles

        $validator = Validator::make($input, $rules);

        if($validator->passes()) {
            $type->title = $request->typeTitle;
            $type->description = $request->typeDescription;


            $type->save();

            $success = [
                'success' => 'Type added successfully',
                'typeId' => $type->id,
                'typeTitle' => $type->title,
                'typeDescription' => $type->description,

            ];

            $success_json = response()->json($success);

            return $success_json;
        }

        $errors = [
            'error' => $validator->messages()->get('*')
        ];

        $errors_json = response()->json($errors);

        return $errors_json;

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }
    public function showAjax(Type $type) {

        $success = [
            'success' => 'Type recieved successfully',
            'typeId' => $type->id,
            'typeTitle' => $type->title,
            'typeDescription' => $type->description,

        ];

        $success_json = response()->json($success);

        return $success_json;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }
    public function editAjax(Type $type) {
        $success = [
            'success' => 'Type recieved successfully',
            'typeId' => $type->id,
            'typeTitle' => $type->title,
            'typeDescription' => $type->description,


        ];

        $success_json = response()->json($success);

        return $success_json;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        //
    }
    public function updateAjax(Request $request, Type $type) {
        $input = [
            'typeTitle' => $request->typeTitle,
            'typeDescription' => $request->typeDescription,

        ];//ka mes ivedama, laukeliu pavadinimai kuriuos validuosim
        $rules = [
            'typeTitle' => 'required|min:3',
            'typeDescription' => 'min:15',

        ]; //taisykles

        $validator = Validator::make($input, $rules);

        if($validator->passes()) {
            $type->title = $request->typeTitle;
            $type->description = $request->typeDescription;

            $type->save();

            $success = [
                'success' => 'Type updated successfully',
                'typeId' => $type->id,
                'typeTitle' => $type->title,
                'typeDescription' => $type->description,

            ];

            $success_json = response()->json($success);

            return $success_json;
        }

        $errors = [
            'error' => $validator->messages()->get('*')
        ];

        $errors_json = response()->json($errors);

        return $errors_json;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
    }
    public function destroySelected(Request $request) {

        $checkedTypes = $request->checkedTypes; // visus id

        $messages = array();


        $errorsuccess = array();

        foreach($checkedTypes as $typeId) {

            $type = Type::find($typeId);
            // $articles_count = $type->typeArticles->count();

                $deleteAction = $type->delete();
                if($deleteAction) {
                    $errorsuccess[] = 'success';
                    $messages[] = "Type ".$typeId." deleted successfully";
                } else {
                    $messages[] = "Something went wrong";
                    $errorsuccess[] = 'danger';
                }

        }
        $success = [
            'success' => $checkedTypes,
            'messages' => $messages,
            'errorsuccess' => $errorsuccess
        ];

        $success_json = response()->json($success);

        return $success_json;

    }
}
