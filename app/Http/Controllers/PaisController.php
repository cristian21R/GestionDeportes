<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pais;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $paises=Pais::all();
        return view('paises.index',compact("paises"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('paises.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datos=[
            'nombre_pais'=>$request->nombre_pais,
        ];
        Pais::create($datos);
        return redirect()->route('paises.index')->with('mensaje','Pais registrado con exito');
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
