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
        $validateVar = $request->validate([


            'type_title' => 'required|regex:/^[a-zA-Z0-9]+$/u',// a-z A-Z 0-9
            'type_description' => 'required|max:1500',


    ]);

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
        $validateVar = $request->validate([


            'type_title' => 'required|regex:/^[a-zA-Z0-9]+$/u',// a-z A-Z 0-9
            'type_description' => 'required|max:1500',


    ]);

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

    public function search(Request $request) {

        // $tasks=Task::all();
      $search = $request->search;


if (isset($search) && !empty($search)){
    $types = Type::query()->sortable()->where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->paginate(5);
} else  {
    return redirect()->route("type.index")->with('danger_message','Your search is empty!');
}



        return view("type.search",['types'=> $types]);
    }
}
