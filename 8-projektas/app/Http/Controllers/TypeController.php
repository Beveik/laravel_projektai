<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Task;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types=Type::all();
        return view("type.index", ["types"=>$types]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type= new Type;
        $type->title = $request->type_title;
        $type->description = $request->type_description;

        $type ->save(); //insert į duomenų bazę
        return redirect()->route("type.index")->with('success_message','Type is added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        // $tasks = $type->typeTasks;
        // $tasks_count = $tasks->count();

        // return view("type.show",["type"=>$type, "tasks"=> $tasks, "tasks_count" => $tasks_count]);
        return view('type.show', ['type' => $type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view("type.edit", ["type"=> $type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $type->title = $request->type_title;
        $type->description = $request->type_description;
        $type ->save(); //insert į duomenų bazę
        return redirect()->route("type.index")->with('success_message','Type is updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        // return redirect()->route("type.index");
        return redirect()->route("type.index")->with('success_message','Type is deleted.');

    }
}
