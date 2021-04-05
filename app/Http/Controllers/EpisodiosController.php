<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Episodio;
use Illuminate\Http\Request;

class EpisodiosController extends BaseController
{
    public function __construct()
    {
        $this->classe = Episodio::class;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'serie_id' => 'int|required|exists:series,id',
            'temporada' => 'int|required',
            'numero' => 'int|required',
            'assistido' => 'bool'
        ]);

        return parent::store($request);
    }

    public function update(int $id, Request $request)
    {
        $this->validate($request, [
            'temporada' => 'int|required',
            'numero' => 'int|required',
            'assistido' => 'bool'
        ]);

        return parent::update($id, $request);
    }

    public function buscaPorSerie(int $serieId)
    {
        $episodios = Episodio::query()
            ->where('serie_id', $serieId)
            ->get();

        return $episodios;
    }
}
