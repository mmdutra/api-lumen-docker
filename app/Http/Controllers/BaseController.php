<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    protected string $classe;

    public function index(Request $request)
    {
        return $this->classe::paginate($request->cur_page);
    }

    public function store(Request $request)
    {
        $recurso = $this->classe::create($request->all());

        return response()->json($recurso, 201);
    }

    public function find(int $id)
    {
        $recurso = $this->classe::find($id);

        if (is_null($recurso)) {
            return response()->json('', 404);
        }

        return response()->json($recurso);
    }

    public function update(int $id, Request $request)
    {
        $recurso = $this->classe::find($id);

        if (is_null($recurso)) {
            return response()->json('', 404);
        }

        $recurso->fill($request->all());
        $recurso->save();

        return response()->json($recurso);
    }

    public function destroy(int $id)
    {
        $qtdRemovidos = $this->classe::destroy($id);

        if ($qtdRemovidos === 0) {
            return response()->json('', 404);
        }

        return response()->json('', 204);
    }
}
