<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends BaseController
{
    public function __construct()
    {
        $this->classe = Serie::class;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|max:255|unique:series'
        ]);

        return parent::store($request);
    }

    public function update(int $id, Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|max:255|unique:series'
        ]);

        return parent::update($id, $request);
    }
}
