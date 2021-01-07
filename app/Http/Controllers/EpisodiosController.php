<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index()
    {
        return Episodio::all();
    }

    public function store(Request $request)
    {
        $episodio = Episodio::create($request->all());

        return response()->json($episodio, 201);
    }

    public function show(int $id)
    {
        $episodio = Episodio::find($id);
        if (!$episodio) {
            return response()->json([], 404);
        }

        return response()->json($episodio);
    }

    public function update(int $id, Request $request)
    {
        $episodio = Episodio::find($id);
        if (!$episodio) {
            return response()->json([], 404);
        }

        $episodio->fill($request->all());
        $episodio->save();

        return response()->json($episodio);
    }

    public function destroy(int $id)
    {
        if (Episodio::destroy($id) === 0) {
            return response()->json([], 404);
        }

        return response()->json([]);
    }
}
