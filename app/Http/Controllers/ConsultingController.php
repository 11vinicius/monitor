<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulting;
use Carbon\Carbon;

class ConsultingController extends Controller
{
    protected $consulting;

    public function __construct(Consulting $consulting) {
        $this->consulting = $consulting;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return $this->consulting->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('image')
        ->storeAs('consulting', Carbon::now()->timestamp.'-'.$request->file('image')->getClientOriginalName(), 'public'); 
        
        return $this->consulting->create([
            'name'=>$request->name,                              // Nome
            'type_of_occurrence'=> $request->type_of_occurrence, // tipo ocorrencia
            'action_taken'=> $request->action_taken,             // ação tomada
            'description'=> $request->description,               // descricao
            'cattle_id'=> $request->cattle_id,                   // Campo que será FK
            'image'=> $image,                                   // imagem
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
