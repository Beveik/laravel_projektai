<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Type;
use Illuminate\Http\Request;

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
        $tasks=Task::all();
        // return view("task.index", ["tasks"=>$tasks]);

        // $collumnName = $request->collumnname; // 'po formos patvirinimo jie yra gauti'
        // $sortby = $request->sortby; // 'po formos patvirtinimo jie yra gaut'

        // if(!$collumnName && !$sortby ) {
        //     $collumnName = 'id';
        //     $sortby = 'asc';
        // }

        // // $companies = Company::orderBy( $collumnName, $sortby)->get();

        // //puslapiavimas
        // $tasks = Task::orderBy( $collumnName, $sortby)->paginate(5);
        // return view('task.index', ['tasks' => $tasks, 'collumnName' => $collumnName, 'sortby' => $sortby, "types"=>$types]);
         $tasks = Task::orderBy( 'id', 'asc')->paginate(5);
         return view('task.index', ['tasks' => $tasks, 'types'=>$types]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $types=Type::all();
        $task= new Task;
            $task->title = $request->task_title;
            $task->description = $request->task_description;
            $task->type_id = $request->task_type_id;
            $task->start_date = $request->task_start;
            $task->end_date = $request->task_end;
            $task->logo = $request->task_logo;

            if ($task->start_date <= $task->end_date) {
                $task ->save();
                return redirect()->route("task.index")->with('success_message','Task is created.');
            } else {

                return view("task.create", ['task' => $task, 'types' => $types])->with('danger_message','Date is wrong.');
                //    return redirect()->route("task.index")->with('danger_message','Date is wrong.');
            }

            $task ->save();
            return redirect()->route("task.index");

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
        $types=Type::all()->sortBy('title', SORT_REGULAR, true); // mažėjimo tvarka
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
        $types=Type::all();
            $task->title = $request->task_title;
            $task->description = $request->task_description;
            $task->type_id = $request->task_type_id;
            $task->start_date = $request->task_start;
            $task->end_date = $request->task_end;


            if ($task->start_date <= $task->end_date) {
                $task ->save();
                return redirect()->route("task.index")->with('success_message','Task is updated.');
            } else {

                return view("task.edit", ['task' => $task, 'types' => $types])->with('danger_message','Date is wrong.');
                //    return redirect()->route("task.index")->with('danger_message','Date is wrong.');
            }

            // $task->logo = $request->task_logo;

            // if($request->has('task_logo'))
            // {
            //     $imageName = time().'.'.$request->task_logo->extension();
            //     $task->task_logo = '/images/'.$imageName;
            //     $request->task_logo->move(public_path('images'), $imageName);
            // } else {
            //     $task->task_logo = '/images/placeholder.png';
            // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy(Task $task)
    {
        // $types_count = $task->CompanyTypes->count(); //gausiu knygu skaiciu
        // if($types_count!=0) {
        //     return redirect()->route("task.index")->with('error_message','You can not delete this task, try again later.');
        // }

        $task->delete();
        return redirect()->route("task.index")->with('success_message','Task is deleted successfully.');

    }
    public function search(Request $request) {
        $types=Type::all();
        // $tasks=Task::all();
      $search = $request->search;
$typefilter=$request->task_type_id;

if (isset($search) && !empty($search)){
    $tasks = Task::query()->sortable()->where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->paginate(5);
} else if (isset($typefilter) && $typefilter!=404 ){
$tasks = Task::sortable()->where('type_id', $typefilter)->paginate(5);
} else  {
    return redirect()->route("task.index")->with('danger_message','Your filter or search is empty!');
}




// return view("task.search",['tasks'=> $tasks]);


        return view("task.search",['tasks'=> $tasks, 'types'=> $types]);
    }

}
