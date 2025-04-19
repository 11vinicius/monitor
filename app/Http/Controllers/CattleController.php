<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cattle;
use App\Http\Requests\CattleRequest;
use Carbon\Carbon;

class CattleController extends Controller
{
    protected $cattle;
    
    /**
     * Constructor.
     *
     * @param  \App\Models\Cattle $cattle
     * @return void
     */
    public function __construct(Cattle $cattle)
    {
        $this->cattle = $cattle;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->cattle->paginate();   
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $avatar = $request->file('avatar')
        ->storeAs('avatars', Carbon::now()->timestamp.'-'.$request->file('avatar')->getClientOriginalName(), 'public'); 

        return $cattle = $this->cattle->create([
            'name'=>$request->name,
            'avatar'=>$avatar,
            'origin_of_cattle'=>$request->origin_of_cattle,
            'identification_number'=>$request->identification_number,
            'registration_number'=>$request->registration_number,
            'breed'=>$request->breed,
            'sex'=>$request->sex,
            'date_of_birth'=>$request->date_of_birth,
        ]);

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            return $this->cattle->where('id', $id)->firstOrFail();
        } catch (\Throwable $th) {
            return response()->json(['error' => 'dados não encontrado'], 404);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $avatar = $request->file('avatar')
            ->storeAs('avatars', Carbon::now()->timestamp.'-'.$request->file('avatar')->getClientOriginalName(), 'public');

            $cattle = $this->cattle
            ->where('id', $id)->firstOrFail()
            ->update([
                'avatar'=>$avatar,
                'origin_of_cattle'=>$request->origin_of_cattle,
                'identification_number'=>$request->identification_number,
                'registration_number'=>$request->registration_number,
                'breed'=>$request->breed,
                'sex'=>$request->sex,
                'date_of_birth'=>$request->date_of_birth,
            ]);

            return $this->cattle->findOrFail($id);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'dados não encontrado'], 404);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            return $this->cattle->where('id', $id)->firstOrFail()->delete(); 
        } catch (\Throwable $th) {
            return response()->json(['error' => 'dados não encontrado'], 404);
        }
    }
}
