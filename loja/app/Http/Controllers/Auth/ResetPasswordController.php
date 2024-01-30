<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestPasswordToken;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordToken;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{

    public function requestCode(RequestPasswordToken $request)
    {

        $user = User::where('email', $request->get('email'))->firstOrFail();

        $token = PasswordToken::create([
            'user_id' => $user->id,
            'token' => Str::random(6),
            'expires_at' => Carbon::now()->addMinutes(60)
        ]);

        Mail::to($user)->queue(new ResetPasswordMail($token));

        return response()->json([
            'message' => 'Código enviado por email'
        ], response::HTTP_CREATED);
    }

    public function verifyCode(Request $request){
        $token = PasswordToken::where('token', $request->get('token'))
        ->firstOrFail();

        if(Carbon::now()->isAfter($token->expires_at)){
         $token->delete();

        return response()->json([
            'message' => 'Token expirado, tente novamente',
        ]);
    }

    $jwt = Auth::login($token->user);

    return response()->json([
    'token' => $jwt
]);
}
}
