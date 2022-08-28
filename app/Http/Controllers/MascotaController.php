<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Especie;
use App\Models\Mascota;
use App\Models\Raza;
class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $raza = Raza::getEspecie();
        $mascota = Mascota::with('especie','cliente')->get(); 
        
        $especie=Especie::all();
        $cliente=Cliente::all();
        return view('mascota.index',compact('especie','cliente','mascota'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mascota::saveMascota($request);
        return redirect()->to('mascota')->with(['type' => 'success', 'message' => 'Registro guardado con exito !!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            Mascota::updateMascota($request, $id);
            return response()->json(['codigo' => 0, 'message' => 'Registro guardado con exito !!']);
        }
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
  
        $mascota=Mascota::findOrFail($id);
        $mascota->delete();
        return redirect()->to('mascota')->with(['type' =>'error','message'=>'Cliente Eliminado']);

    }
    public function searchraza(Request $request, $id)
    {
        if ($request->ajax()) {
            $raza=Raza::getEspecie($id);
            return response()->json($raza);
        }
    }
}
