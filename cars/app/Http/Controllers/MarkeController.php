<?php

namespace App\Http\Controllers;

use App\Models\Marke;
use Illuminate\Http\Request;
// use App\Http\Requests\UpdateMarkeRequest;

class MarkeController extends Controller
{

    public function index()
    {
        return Marke::all();
    }

    public function store()
    {
        request()->validate([
            'marke' => 'required||unique:markes',
            'salis' => 'required||min:3',
        ]);

        Marke::create([
            'marke' => request('marke'),
            'salis' => request('salis'),
        ]);
        $message = 'Markė pridėta sėkmingai.';
        return response()->json($message, 201);
    }

    public function show(Marke $marke)
    {
        if ($marke->exists()) {
            return response()->json($marke, 200);
        } else {
            $message = 'Markė nerasta.';
            return response()->json($message, 404);
        }
    }

    public function update(Marke $marke)
    {
        if ($marke->exists()) {

            request()->validate([
                'marke' => 'required',
                'salis' => 'required||min:3',
            ]);

            $marke->update([
                'marke' => request('marke'),
                'salis' => request('salis'),
            ]);
            $message = 'Markė atnaujinta sėkmingai.';

            return response()->json($message, 200);
        } else {
            $message = 'Markė nerasta.';
            return response()->json($message, 404);
        }
    }

    public function destroy(Marke $marke)
    {
        if ($marke->exists()) {
            $marke->delete();
            $message = "Markė ištrinta sėkmingai.";
            return response()->json($message, 202);
        } else {
            $message = 'Markė nerasta.';
            return response()->json($message, 404);
        }
    }
}
