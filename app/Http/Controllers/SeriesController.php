<?php

namespace App\Http\Controllers;

class SeriesController extends Controller
{
    public function index()
    {
        return [
            'House MD',
            'Sabrina'
        ];
    }
}
