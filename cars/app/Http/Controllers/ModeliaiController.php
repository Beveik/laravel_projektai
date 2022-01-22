<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modeliai;
use App\Models\Marke;
use App\Models\Metai;

class ModeliaiController extends Controller
{
    public function index()
    {
        return Modeliai::all();
    }

    public function store()
    {

        $markes_id = request('markes_id');
        $metu_id = request('metu_id');

        request()->validate([
            'modelis' => 'required',
            'markes_id' => 'required|numeric',
            'metu_id' => 'required|numeric',
        ]);

        $markes = Marke::where('id', '=', $markes_id)->first();
        if ($markes === null) {
            $message = 'Tokios markės nėra.';
        } else {
            $metai = Metai::where('id', '=', $metu_id)->first();
            if ($metai === null) {
                $message = 'Tokių metų nėra.';
            } else {
                Modeliai::create([

                    'modelis' => request('modelis'),
                    'markes_id' => $markes_id,
                    'metu_id' => $metu_id,
                ]);

                $message = 'Modelis pridėtas sėkmingai.';
            }
        }
        return response()->json($message, 201);
    }

    public function show(Modeliai $modeliai)
    {
        if ($modeliai->exists()) {
            return response()->json($modeliai, 200);
        } else {
            $message = 'Modelis nerastas.';
            return response()->json($message, 404);
        }
    }
    public function update(Modeliai $modeliai)
    {
        if ($modeliai->exists()) {
            $markes_id = request('markes_id');
            $metu_id = request('metu_id');

            request()->validate([
                'modelis' => 'required|',
                'markes_id' => 'required|numeric',
                'metu_id' => 'required|numeric',
            ]);
            $markes = Marke::where('id', '=', $markes_id)->first();
            if ($markes === null) {
                $message = 'Tokios markės nėra.';
            } else {
                $metai = Metai::where('id', '=', $metu_id)->first();
                if ($metai === null) {
                    $message = 'Tokių metų nėra.';
                } else {
                    $modeliai->update([
                        'modelis' => request('modelis'),
                        'markes_id' => $markes_id,
                        'metu_id' => $metu_id,
                    ]);
                    $message = 'Modelis atnaujintas sėkmingai.';
                }
            }
            return response()->json($message, 201);
        } else {
            $message = 'Modelis nerastas.';
            return response()->json($message, 404);
        }
    }

    public function destroy(Modeliai $modeliai)
    {
        if ($modeliai->exists()) {
            $modeliai->delete();
            $message = "Modelis ištrintas sėkmingai.";
            return response()->json($message, 202);
        } else {
            $message = 'Modelis nerastas.';
            return response()->json($message, 404);
        }
    }
}
