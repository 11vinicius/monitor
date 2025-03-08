<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $user;
    protected $hash;

    public function __construct(User $user, Hash $hash) {
        $this->user = $user;
        $this->hash = $hash;
    }

    public function signIn(Request $request) {
        try {    
            $user = $this->user->where('email', $request->email)->firstOrFail();
            
            if(!$user || !$this->hash::check($request->password, $user->password)) {
                return response()->json(['error' => 'Email ou senha inválidos'], 401);
            }
    
            if($user->tokens()->count() > 0) {
                $user->tokens()->delete();
            }
    
            $token = $user->createToken('token-name', ['server:update'])->plainTextToken;
            return response()->json(['token' => $token], 200);
    
            } catch (\Throwable $th) {
                return response()->json(['error' => 'Email ou senha inválidos'], 401);
            }

    }
}
