<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use Illuminate\Http\Request;

class EpisodiosController extends DefaultController
{
    public function __construct()
    {
        $this->model = Episodio::class;
    }

    public function findBySerie(int $serieId, Request  $request)
    {
        return Episodio::query()
            ->where('serie_id', $serieId)
            ->paginate($request->per_page);
    }
}
