<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        return Serie::all();
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());

        return response()->json($serie, 201);
    }

    public function show(int $id)
    {
        $serie = Serie::find($id);
        if (!$serie) {
            return response()->json($serie, 404);
        }

        return response()->json($serie);
    }

    public function update(int $id, Request $request)
    {
        $serie = Serie::find($id);
        if (!$serie) {
            return response()->json($serie, 404);
        }

        $serie->fill($request->all());
        $serie->save();

        return response()->json($serie);
    }
}
