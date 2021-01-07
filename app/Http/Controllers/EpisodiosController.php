<?php

namespace App\Http\Controllers;

use App\Models\Episodio;

class EpisodiosController extends DefaultController
{
    public function __construct()
    {
        $this->model = Episodio::class;
    }
}
