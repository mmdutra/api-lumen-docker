<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Jobs\ProcessarPedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function realizarPedido(Request $request)
    {
        $data = [
            'nome' => 'Mateus Teste',
            'email' => 'teste@exemplo.com'
        ];

        $this->dispatch(new ProcessarPedido($data));
    }
}
