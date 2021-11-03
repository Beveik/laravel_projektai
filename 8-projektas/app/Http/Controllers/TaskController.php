<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Owner;
use App\Models\Type;
use App\Models\PaginationSetting;
use Illuminate\Http\Request;
use PDF;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginationSettings=PaginationSetting::all();
        $owners=Owner::all();
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
        // $tasks = Task::orderBy( $collumnName, $sortby);
        // return view('task.index', ['tasks' => $tasks, 'collumnName' => $collumnName, 'sortby' => $sortby, "types"=>$types]);


        $tasks = Task::orderBy( 'id', 'asc')->paginate(15);
         return view('task.index', ['tasks' => $tasks, 'types'=>$types, "owners"=>$owners, "paginationSettings"=>$paginationSettings]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=Type::all()->sortBy('title', SORT_REGULAR, true);
        $owners=Owner::all()->sortBy('name', SORT_REGULAR, false);

        return view("task.create", ["types"=>$types, "owners"=>$owners]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $types=Type::all()->sortBy('title', SORT_REGULAR, false);
        $owners=Owner::all()->sortBy('name', SORT_REGULAR, false);
        $type_count=$types->count();
        $owner_count=$owners->count();
        $task= new Task;

        $validateVar = $request->validate([

            // 'title' => [ 'unique:tasks', 'regex:/^[a-zA-Z0-9]+$/u'],// a-z A-Z 0-9
            'task_title' => 'required|unique:tasks,title|regex:/^[a-zA-Z0-9]+$/u|min:6|max:225',// a-z A-Z 0-9
            'task_description' => 'required|max:1500',
            'task_type_id' => 'numeric|integer|lte:'.$type_count,
            'task_owner_id' => 'numeric|integer|lte:'.$owner_count,
            'task_start' => 'required|date', //required|date|before:end_date
            'task_end' => 'required|date|after:start_date',
            'task_logo' => 'image',
    ]);

            $task->title = $request->task_title;
            $task->description = $request->task_description;
            $task->type_id = $request->task_type_id;
            $task->start_date = $request->task_start;
            $task->end_date = $request->task_end;
            $task->owner_id = $request->task_owner_id;
            $task->logo = $request->task_logo;

            // if ($task->start_date <= $task->end_date) {
            //     $task ->save();
            //     return redirect()->route("task.index")->with('success_message','Task is created.');
            // } else {

            //     return view("task.create", ['task' => $task, 'types' => $types])->with('danger_message','Date is wrong.');
            //     //    return redirect()->route("task.index")->with('danger_message','Date is wrong.');
            // }

            $task ->save();
            // return redirect()->route("task.index");
            return redirect()->route("task.index")->with('success_message','Task is created.');
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
        $types=Type::all()->sortBy('title', SORT_REGULAR, false); // mažėjimo tvarka
        $owners=Owner::all()->sortBy('name', SORT_REGULAR, false);
        return view("task.edit", ["task"=>$task, "types"=>$types, "owners"=>$owners ]);
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
    public function search(Request $request, Task $task) {
        $paginationSettings=PaginationSetting::all();
        $types=Type::all();
        $tasks=Task::all();
      $search = $request->search;
$typefilter=$request->task_type_id;
$pagination = $request->pagination;
$task_count = $tasks -> count();

if ($pagination==1) {
    $pagination=$task_count;
}
    if (isset($pagination)  && isset($typefilter) && $typefilter!=404 ){
$tasks = Task::sortable()->where('type_id', $typefilter)->paginate($pagination);
    } else if ($typefilter==404){
        $tasks = Task::orderBy( 'id', 'asc')->paginate($pagination);
    }

 if (isset($search)){
    $tasks = Task::query()->sortable()->where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->paginate($pagination);
}
    // }
        return view("task.search",['tasks'=> $tasks,'task'=> $task, 'types'=> $types, 'paginationSettings'=>$paginationSettings, 'pagination'=>$pagination]);
    }

    public function generatePDF() {

        //1. Pasiimti visus duomenis x
        // 2. kazkokiu panaudoti pdf biblioteka
        // 3. sugeneruoti atsisiuntimo nuoroda

        $tasks = Task::all();

        view()->share('tasks', $tasks);

        $pdf = PDF::loadView('pdf_template_tasks', $tasks);

        return $pdf->download('tasks.pdf');

    }
    public function generateTask(Task $task)
    {
        view()->share('task', $task);

        $pdf = PDF::loadView("pdf_template_task", $task);
        return $pdf->download("task".$task->id.".pdf");

    }

//     public function pagination(Request $request, PaginationSetting $paginationSetting) {
//         // $paginationSettings=PaginationSetting::all();
// $pagination = $request->pagination;
//         // $tasks=Task::all();
//         if ($paginationSetting->visible==1){

// if ($pagination==1) {
//     $tasks = Task::all();
//  } else  {
// $tasks = Task::paginate($pagination);
// }
//         return view("task.index",['tasks'=> $tasks, 'paginationSetting'=> $paginationSetting]);
//     }
// }
}
