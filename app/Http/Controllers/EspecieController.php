<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especie;

class EspecieController extends Controller
{

    public function index()
    {
        $especie=Especie::all();
        return view('especie.index',compact('especie'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        Especie::saveEspecie($request);
        return redirect()->to('especie')->with(['type' => 'success', 'message' => 'Registro guardado con exito !!']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            Especie::updateEspecie($request, $id);
            return response()->json(['codigo' => 0, 'message' => 'Registro guardado con exito !!']);
        }
    }


    public function destroy($id)
    {
        $especie=Especie::findOrFail($id);
        $especie->delete();
        return redirect()->to('especie')->with(['type' =>'error','message'=>'Cliente Eliminado']);

    }
    
}
