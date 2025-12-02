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

  $request->validate([
        'nombre_pais' => 'required|unique:paises,nombre_pais',
    ], [
        'nombre_pais.unique' => 'Este país ya existe.',
    ]);

        $datos=[
            'nombre_pais'=>$request->nombre_pais,
        ];
        Pais::create($datos);
        return redirect()->route('pais.index')->with('success','Pais registrado con exito');
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
        $pais = Pais::findOrFail($id);



        
        return view('paises.editar',compact('pais'));

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pais = Pais::findOrFail($id);

/*esta funcion me permite valdiar que se unico*/
    $request->validate([
    'nombre_pais' => 'required|unique:paises,nombre_pais,' . $id,
], [
    'nombre_pais.unique' => 'Este país ya existe.',
]);


        $pais->update($request->all());
        return redirect()->route('pais.index')->with('success','Pais actualizado correctamente');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pais = Pais::findOrFail($id);

        if ($pais->paises()->count() > 0) {
        return redirect()->route('pais.index')
                         ->with('error', 'No se puede eliminar el pais porque tiene deportistas asociados.');
        }


        $pais->delete();
        return redirect()->route('pais.index')->with('success','Pais eliminado correctamente');

        
    }
}
