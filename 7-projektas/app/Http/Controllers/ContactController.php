<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Company;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts=Contact::all();
        return view("contact.index", ["contacts"=>$contacts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("contact.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact= new Contact;
        $contact->title = $request->contact_title;
        $contact->phone = $request->contact_phone;
        $contact->address = $request->contact_address;
        $contact->email = $request->contact_email;
        $contact->country = $request->contact_country;
        $contact->city = $request->contact_city;

        $contact ->save(); //insert į duomenų bazę
        return redirect()->route("contact.index")->with('success_message','Kontaktas sėkmingai pridėtas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $companies = $contact->contactCompanies;
        $companies_count = $companies->count();

        return view("contact.show",["contact"=>$contact, "companies"=> $companies, "companies_count" => $companies_count]);
        // return view('contact.show', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view("contact.edit", ["contact"=> $contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {

        $contact->title = $request->contact_title;
        $contact->phone = $request->contact_phone;
        $contact->address = $request->contact_address;
        $contact->email = $request->contact_email;
        $contact->country = $request->contact_country;
        $contact->city = $request->contact_city;

        $contact ->save(); //insert į duomenų bazę
        return redirect()->route("contact.index")->with('success_message','Kontaktas sėkmingai redaguotas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact, Request $request)
    {
        $companies_count = $contact->contactCompanies->count(); //gausiu knygu skaiciu
        if($companies_count!=0) {
            return redirect()->route("contact.index")->with('error_message','Ištrinti negalima, nes kontaktas priklauso kompanijoms');
        }

        $contact->delete();
        return redirect()->route("contact.index")->with('success_message','Kontaktas sėkmingai ištrintas');
        // $contact->delete();
        // return redirect()->route("contact.index");
    }
}
