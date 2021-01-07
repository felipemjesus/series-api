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
        $serie = Serie::create(['nome' => $request->nome]);

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
}
