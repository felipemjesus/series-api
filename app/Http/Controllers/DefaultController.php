<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class DefaultController extends Controller
{
    protected string $model;

    public function index()
    {
        return $this->model::all();
    }

    public function store(Request $request)
    {
        $obj = $this->model::create($request->all());

        return response()->json($obj, 201);
    }

    public function show(int $id)
    {
        $obj = $this->model::find($id);
        if (!$obj) {
            return response()->json([], 404);
        }

        return response()->json($obj);
    }

    public function update(int $id, Request $request)
    {
        $obj = $this->model::find($id);
        if (!$obj) {
            return response()->json([], 404);
        }

        $obj->fill($request->all());
        $obj->save();

        return response()->json($obj);
    }

    public function destroy(int $id)
    {
        if ($this->model::destroy($id) === 0) {
            return response()->json([], 404);
        }

        return response()->json([]);
    }
}
