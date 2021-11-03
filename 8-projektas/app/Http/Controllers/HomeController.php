<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Type;
use App\Models\Task;
use App\Models\Paginationsetting;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function generatePDF() {

        $owners=Owner::all();
        $types=Type::all();
        $tasks=Task::all();
        $paginationsettings=Paginationsetting::all();

        $owner_count = $owners -> count();
        $type_count = $types -> count();
        $task_count = $tasks -> count();
        $pagination_count = $paginationsettings -> count();

        view()->share(['owner_count' => $owner_count, 'type_count' => $type_count, 'task_count'=>$task_count, 'pagination_count'=>$pagination_count]);

        $pdf = PDF::loadView('pdf_statistics');

        return $pdf->download('statistics.pdf');

    }
}
