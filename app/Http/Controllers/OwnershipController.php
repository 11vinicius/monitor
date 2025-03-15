<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ownership;
use App\Http\Requests\OwnershipRequest;

class OwnershipController extends Controller
{
    protected $ownership;
    /**
     * Constructor.
     *
     * @param  \App\Models\Ownership $ownership
     * @return void
     */
    public function __construct(Ownership $ownership) {
        $this->ownership = $ownership;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->ownership->paginate();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(OwnershipRequest $request)
    {
        try {
            return $this->ownership->create([
                'user_id'=>$request->user()->id ,
                'name'=>$request->name,
                'description'=>$request->description,
                'registration_number'=>$request->registration_number,
                'lat'=>$request->lat,
                'long'=>$request->long,
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'dados não encontrado'], 404);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            return $this->ownership->where('id', $id)->firstOrFail();
        } catch (\Throwable $th) {
            return response()->json(['error' => 'dados não encontrado'], 404);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(OwnershipRequest $request, string $id)
    {
        try {
            $ownership = $this->ownership->where('id', $id)->firstOrFail();

             $ownership->update([
                'name'=>$request->name,
                'description'=>$request->description,
                'registration_number'=>$request->registration_number,
                'lat'=>$request->lat,
                'long'=>$request->long
            ]);
            return $ownership;
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
            $ownership = $this->ownership->where('id', $id)->firstOrFail();
            return $ownership->delete();
        } catch (\Throwable $th) {
            return response()->json(['error' => 'dados não encontrado'], 404);
        }
    }
}
