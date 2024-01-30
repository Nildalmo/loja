<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$permissions): Response
    {
        if(!Auth::check()) {
            return response()->json([
                'message' => 'Usuário não autenticado.'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();

        if(!$user->permissions()->whereIn('name', $permissions)->exists()){
            return response()->json([
               'message' =>'Sem permissão.'
            ], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
