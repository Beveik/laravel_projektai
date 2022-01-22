<?php

namespace App\Http\Controllers;

use App\Models\Metai;


class MetaiController extends Controller
{

    public function index()
    {
        return Metai::all();
    }

    public function store()
    {
        $year = date("Y");
        $metai = Metai::where('metai', '=', $year)->first();
        if ($metai === null) {

            request()->validate([
                'metai' => 'required|numeric',
            ]);

            Metai::create([
                'metai' => $year,
            ]);

            $message = 'Metai pridėti sėkmingai.';
            return response()->json($message, 201);
        } else {
            $message = 'Tokie metai jau yra.';
            return response()->json($message, 404);
        }
    }

    public function show(Metai $metai)
    {
        if ($metai->exists()) {
            return response()->json($metai, 200);
        } else {
            $message = 'Metai nerasti.';
            return response()->json($message, 404);
        }
    }
}
