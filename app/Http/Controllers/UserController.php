<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->user->paginate();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            return $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar usuário',
                'error' => 'E-mail já cadastrado',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = $this->user->where('id', $id)->firstOrFail();
            return $user;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Usuário não encontrado',
            ], 404);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        try {
            $user = $this->user->where('id', $id)->firstOrFail();

            if(!$user) {
                return response()->json([
                    'message' => 'Usuário não encontrado',
                ], 404);
            }

             $this->user->where('id', $user->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),

            ]);

            return $user;

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Usuário não encontrado',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $this->user->where('id', $id)->delete();
    }
}
