<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=Client::all();
        return view("client.index", ["clients"=>$clients]);

                // return view("author.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("client.create"); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client= new Client;
        $client->name = $request->client_name;
        //kairėj stulpelio pavadinimas
        //dešinėj pusėj input laukelio vardas, kurį suteikėme input formoj
        //tas pats, kas $GET["author_name"]
        $client->surname = $request->client_surname;
        $client->username = $request->client_username;
        $client->company_id = $request->client_company;
        $client->image_url = $request->client_image;


        $client ->save(); //insert į duomenų bazę
        return redirect()->route("client.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('client.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view("client.edit", ["client"=> $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->name = $request->client_name;
        $client->surname = $request->client_surname;
        $client->username = $request->client_username;
        $client->company_id = $request->client_company;
        $client->image_url = $request->client_image;
        $client->save(); //UPDATE

        return redirect()->route("client.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route("client.index");
    }
}
