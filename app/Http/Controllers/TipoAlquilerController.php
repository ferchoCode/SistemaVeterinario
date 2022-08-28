<?php

namespace App\Http\Controllers;

use App\Models\TipoAlquiler;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TipoAlquilerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if (!Gate::allows('listar_tipo_alquiler')) {
        //     return abort(401);
        // }
        $tipo_alquileres = TipoAlquiler::getTipoAlquiler();

        return view('tipo-alquiler.index', compact('tipo_alquileres'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required',
        ];
        $messages = [
            'nombre.required' => 'Nombre requerido',
            'descripcion.required' => 'descripcion requerido'
        ];
        $this->validate($request, $rules, $messages);
        TipoAlquiler::guardarTipoAlquiler($request);
        return redirect()->to('tipo-alquiler')->with(['type' => 'success', 'message' => 'Registro guardado con exito !!']);
        //return response()->json(['codigo' => 0, 'message' => 'Registro guardado con exito !!']);
        
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

            $rules = [
                'nombre' => 'required',
                'descripcion' => 'required',
            ];
            $messages = [
                'nombre.required' => 'Nombre requerido',
                'descripcion.required' => 'descripcion requerido'
            ];
            $this->validate($request, $rules, $messages);

            TipoAlquiler::editarTipoAlquiler($request, $id);
            //return redirect()->to('tipo-alquiler')->with(['type' => 'success', 'message' => 'Registro actualizado con exito !!']);
            return response()->json(['codigo' => 0, 'message' => 'Registro guardado con exito !!']);
            
            //return response()->json($messages);
        }
    }

    public function destroy($id)
    {
        //
    }
}
