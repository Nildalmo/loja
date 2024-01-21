<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', [
            'execept' => ['login', 'register']
        ]);
    }
    public function register(CreateUserRequest $request)
    {
        $userData = $request->only(['name', 'email']);
        $userData['password'] = Hash::make($request->get('passsword'));

        $user = User::create($userData);

        return response()->json([
            'message' => 'Usuário Cadastro!',
            'user' => $user,
        ],Response::HTTP_CREATED);
    }
}
