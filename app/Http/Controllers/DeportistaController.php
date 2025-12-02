<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Deportista;
use App\Models\Pais;
use App\Models\Disciplina;


class DeportistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $deportistas = Deportista::all();
        return view('deportistas.index',compact("deportistas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $paises = Pais::all();
        $disciplinas = Disciplina::all();
        return view('deportistas.nuevo',compact('paises', 'disciplinas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data=[
            'nombre_deportista'=>$request->nombre_deportista,
            'fk_id_pais'=>$request->fk_id_pais,
            'fk_id_disciplina'=>$request->fk_id_disciplina,
            'nacimiento_deportista'=>$request->fecha_nacimiento,
            'estatura_deportista'=>$request->estatura,
            'peso_deportista'=>$request->peso,
        ];
        Deportista::create($data);
        return redirect()->route('deportista.index')->with('mensaje','Deportista registrado correctamente');

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

        $deportista = Deportista::findOrFail($id);
        $paises = Pais::all();
        $disciplinas = Disciplina::all();
        return view('deportistas.editar',compact('deportista','paises','disciplinas'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $deportista = Deportista::findOrFail($id);
        $deportista->update($request->all());
        return redirect()->route('deportista.index')->with('mensaje','Deportista actualizado correctamente');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $deportista = Deportista::findOrFail($id);
        $deportista->delete();
        return redirect()->route('deportista.index')->with('mensaje','Deportista eliminado correctamente');


    }
}
