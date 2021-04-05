<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\User;
use Firebase\JWT\JWT;

class Autenticador
{
    public function handle($request, \Closure $next)
    {
        try {
            if (!$request->hasHeader('Authorization')) {
                throw new \Exception();
            }

            $authorizationHeader = $request->header('Authorization');
            $token = str_replace('Bearer ', '', $authorizationHeader);

            $dadosAutenticacao = JWT::decode($token, env('JWT_KEY'), ['HS256']);

            $user = User::where('email', $dadosAutenticacao->email)->first();

            if (is_null($user)) {
                throw new \Exception();
            }
        } catch (\Exception $exception) {
            return response()->json('Não autorizado', 401);
        }

        return $next($request);
    }
}
