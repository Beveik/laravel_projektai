<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners=Owner::orderBy( 'id', 'asc')->paginate(15);
        // $ownerscount=$owners->count();
        return view("owner.index", ["owners"=>$owners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("owner.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $owner= new Owner;

        $validateVar = $request->validate([


            'owner_name' => 'required|regex:/^[a-zA-Z0-9]+$/u|min:2|max:15',// a-z A-Z 0-9
            'owner_surname' => 'required|regex:/^[a-zA-Z0-9]+$/u|min:2|max:15',
            'owner_email' => 'required|regex:/.+@.+\..+/',
            'owner_phone' => 'required|digits:12|regex:/^\+3706/ ', //(86|\+3706) \d{3} \d{4}

    ]);
        $owner->name = $request->owner_name;
        $owner->surname = $request->owner_surname;
        $owner->email = $request->owner_email;
        $owner->phone = $request->owner_phone;
        $owner ->save(); //insert į duomenų bazę
        return redirect()->route("owner.index")->with('success_message','Owner is added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        return view('owner.show', ['owner' => $owner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('owner.edit', ['owner' => $owner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        $validateVar = $request->validate([


            'owner_name' => 'required|regex:/^[a-zA-Z0-9]+$/u|min:2|max:15',// a-z A-Z 0-9
            'owner_surname' => 'required|regex:/^[a-zA-Z0-9]+$/u|min:2|max:15',
            'owner_email' => 'required|regex:/.+@.+\..+/',
            'owner_phone' => 'required|min:12|max:12|regex:/^\+3706/ ',

    ]);

        $owner->name = $request->owner_name;
        $owner->surname = $request->owner_surname;
        $owner->email = $request->owner_email;
        $owner->phone = $request->owner_phone;

        $owner ->save(); //insert į duomenų bazę
        return redirect()->route("owner.index")->with('success_message','Owner is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        // return redirect()->route("type.index");
        return redirect()->route("owner.index")->with('success_message','Owner is deleted.');

    }

    public function search(Request $request) {

        // $owners=Owner::all();
      $search = $request->search;


if (isset($search) && !empty($search)){
    $owners = Owner::query()->sortable()->where('name', 'LIKE', "%{$search}%")->orWhere('surname', 'LIKE', "%{$search}%")->paginate(15);
} else  {
    return redirect()->route("owner.index")->with('danger_message','Your search is empty!');
}



        return view("owner.search",['owners'=> $owners]);
    }

    public function generatePDF() {

        //1. Pasiimti visus duomenis x
        // 2. kazkokiu panaudoti pdf biblioteka
        // 3. sugeneruoti atsisiuntimo nuoroda

        $owners = Owner::all();

        view()->share('owners', $owners);

        $pdf = PDF::loadView('pdf_template_owners', $owners);

        return $pdf->download('owners.pdf');


        // return 0;
    }
    public function generateOwner(Owner $owner)
    {
        view()->share('owner', $owner);

        $pdf = PDF::loadView("pdf_template_owner", $owner);
        return $pdf->download("owner".$owner->id.".pdf");

    }
}
