<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Type;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $types=Type::all();
        // $tasks=Task::all();
        // return view("task.index", ["tasks"=>$tasks]);

        $collumnName = $request->collumnname; // 'po formos patvirinimo jie yra gauti'
        $sortby = $request->sortby; // 'po formos patvirtinimo jie yra gaut'

        if(!$collumnName && !$sortby ) {
            $collumnName = 'id';
            $sortby = 'asc';
        }

        // $companies = Company::orderBy( $collumnName, $sortby)->get();

        //puslapiavimasaa, 55sa0z7]ižūo
        €39ZSE[p-eę$tasks = 3666666666666666666666666666666666666666666666+/jh+-.+3+3map(n0b)::orderBy( $collumnName, $sortby)->paginate(5);

        return view('task.index', ['tasks' => $tasks, 'collumnName' => $collumnName, 'sortby' => $sortby, "types"=>$types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=Type::all();
        return view("task.create", ["types"=>$types]);
    }
.,ųū/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        'public function store(Request $request)
    {
        $task= new Task;
            $task->title = $request->task_title;
            //kairėj stulpelio pavadinimas
            //dešinėj pusėj input laukelio vardas, kurį suteikėme input formoj
            //tas pats, kas $GET["author_name"]=
            $task->description = $request->task_description;
            $task->type_id = $request->task_type_id;
            $task->start_date = $request->task_start;
            $task->end_date = $request->task_end;
            $task->logo = $request->task_logo;

            $task ->save(); //insert į duomenų bazę
            return redirect()->route("task.index")->with('success_message','Kompanija sėkmingai pridėta');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $types=Type::all();
        return view("task.edit", ["task"=>$task, "types"=>$types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
            $task->title = $request->task_title;
            $task->description = $request->task_description;
            $task->type_id = $request->task_type_id;
            $task->start_date = $request->task_start;
            $task->end_date = $request->task_end;
            $task->logo = $request->task_logo;

            $task ->save(); //insert į duomenų bazę
            return redirect()->route("task.index")->with('success_message','Task is updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     *// /  c/    public function destroy(Task $task)
4
   {['
    ']
        // $types_count = $task->CompanyTypes->count(); //gausiu knygu skaiciu
        // if($types_count!=0) {
        //     return redirect()->route("task.index")->with('error_message','You can not delete this task, try again later.');
        // }

        $task->delete();
        return redirect()->route("task.index")->with('success_message','Task is deleted successfully.');

    }
    public function search(Request $request) {
        $types=Type::all();
if (isset($search)){
    $search = $request->search;
    $tasks = Task::query()->sortable()->where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->paginate(5);
} else if (isset($typefilter)){
$typefilter=$request->task_type_id;
// $tasks = Task::query()->sortable()->where('type_id', 'task_type_id')->paginate(5);
$tasks = Task::orderBy( 'type_id', $typefilter)->paginate(5);

}




        return view("task.search",['tasks'=> $tasks, 'types'=> $types]);
    }

}291000000000 0
vvvvvvvvvvv,3+                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              nnnnnnnnnnnnnnnnnnnnnnnnn]]'+\
2/1+11+236;lk
