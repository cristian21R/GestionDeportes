<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\Deportista;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $disciplinas=Disciplina::all();
        return view('disciplinas.index',compact("disciplinas"));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('disciplinas.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = [
            'nombre_disciplina'=>$request->nombre_disciplina,    
        ];

        Disciplina::create($data);
        return redirect()->route('disciplina.index')->with('mensaje','Disciplina registrada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $disciplina= Disciplina::findOrFail($id);
        return view('disciplinas.editar',compact('disciplina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $disciplina= Disciplina::findOrFail($id);
        $disciplina->update($request->all());
        return redirect()->route('disciplina.index')->with('mensaje','Disciplina actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $disciplina= Disciplina::findOrFail($id);
        if ($disciplina->deportistas()->count() > 0) {
        return redirect()->route('disciplina.index')
                         ->with('mensaje', 'No se puede eliminar la disciplina porque tiene deportistas asociados.');
        }

        $disciplina->delete();
        return redirect()->route('disciplina.index')->with('mensaje','Disciplina eliminada correctamente');


    }


    
}
