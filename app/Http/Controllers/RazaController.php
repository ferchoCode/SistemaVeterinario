<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Raza;
use App\Models\Especie;


class RazaController extends Controller
{

    public function index()
    {
        $especie=Especie::all();
        $raza=Raza::all();
        return view('raza.index',compact('raza','especie'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        Raza::saveRaza($request);
        return redirect()->to('raza')->with(['type' => 'success', 'message' => 'Registro guardado con exito !!']);
    }


    public function show($id)
    {
        
    }


    public function edit($id)
    {
        $raza=Raza::with('especie')->findOrFail($id);
        $especie=Especie::all();
        return view('raza.edit',compact('raza','especie'));
    }


    public function update(Request $request, $id)
    {
       Raza::updateRaza($request, $id);
       return redirect()->to('raza')->with(['type' =>'error','message'=>'Cliente Eliminado']);


    }

    
    public function destroy($id)
    {
        $raza=Raza::findOrFail($id);
        $raza->delete();
        return redirect()->to('raza')->with(['type' =>'error','message'=>'Cliente Eliminado']);

    }
    public function buscarespecie(Request $request, $id)
    {
        if ($request->ajax()) {
            $especie=Especie::getEspecie($id);
            return response()->json($especie);
        }
    }
}
