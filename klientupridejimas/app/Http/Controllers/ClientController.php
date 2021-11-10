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
        $clients = Client::all();
        return view("client.index",["clients"=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createclients(Request $request)
    {
        $clientsCount = $request->clientsCount;

        if(!$clientsCount) {
            $clientsCount = 1;
        }

        if($request->clientAdd == "plus") {
            $clientsCount++;
        } else if($request->clientAdd == "minus") {
            $clientsCount--;
        }

        return view("client.createclients", ["clientsCount" => $clientsCount]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeclients(Request $request)
    {
        $request->validate([
            "clientName.*.name" => "required",
            "clientSurname.*.surname" => "required",
            "clientDescription.*.description" => "required",

        ]);

        $clientsCount = count($request->clientName); // 3

        for ($i = 0; $i<$clientsCount; $i++ ) {
            $client = new Client;
            //$i
            $client->name = $request->clientName[$i]['name'];
            $client->surname = $request->clientSurname[$i]['surname'];
            $client->description = $request->clientDescription[$i]['description'];

            $client->save();

        }
        return redirect()->route("client.index")->with('success_message','Clients is added.');
    }
    public function createclientsjava(Request $request)
    {
        $clientsCount = $request->clientsCount;

        if(!$clientsCount) {
            $clientsCount = 1;
        }

        return view("client.createclientsjava", ["clientsCount" => $clientsCount]);
    }
    public function storeclientsjava(Request $request)
    {

        $clientsCount = count($request->clientName); // 3

        for ($i = 0; $i<$clientsCount; $i++ ) {
            $client = new Client;
            //$i
            $client->name = $request->client_name[$i];
            $client->surname = $request->client_surname[$i];
            $client->description = $request->client_description[$i];

            $client->save();

        }
        return redirect()->route("client.index")->with('success_message','Clients is added.');
    }
    public function createclient(Request $request)
    {
        return view("client.createclient");

    }
    public function storeclient(Request $request)
    {
        $validateVar = $request->validate([


            'client_name' => 'required|regex:/^[a-zA-Z0-9]+$/u',// a-z A-Z 0-9
            'client_surname' => 'required|regex:/^[a-zA-Z0-9]+$/u',// a-z A-Z 0-9
            'client_description' => 'required|max:1500',


    ]);

        $client= new Client;
        $client->name = $request->client_name;
        $client->surname = $request->client_surname;
        $client->description = $request->client_description;

        $client ->save(); //insert į duomenų bazę
        return redirect()->route("client.index")->with('success_message','Client is added.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
