<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Mascota;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente=Cliente::all();

        return view('cliente.index',compact('cliente'));
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

        Cliente::saveCliente($request);
        return redirect()->to('cliente')->with(['type' => 'success', 'message' => 'Registro guardado con exito !!']);

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

            $rules = [
                'nombre' => 'required',
                'apellido' => 'required',
                'direccion' => 'required',
                'telefono' => 'required',

            ];
            $messages = [
                'nombre.required' => 'Nombre requerido',
                'apellido.required' => 'apellido requerido',
                'direccion.required' => 'direccion requerido',
                'telefono.required' => 'telefono requerido',

            ];
            $this->validate($request, $rules, $messages);

            Cliente::updateCliente($request, $id);
            return response()->json(['codigo' => 1, 'message' => 'Registro guardado con exito !!']);
            
            //return redirect()->to('cliente')->with(['type' => 'success', 'message' => 'Registro guardado con exito !!']);
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
        
        $cliente=Mascota::conbrobarcliente($id);

        if(json_decode($cliente) == null){
            $cliente=Cliente::find($id);
            $cliente->delete();
            return redirect()->to('cliente')->with('success','Registro Eliminado');
        }else{
            // return redirect()->to('cliente')->with(['type'=>'error','message'=>'Este cliente tiene una mascota su nombre']);
            // dd('Este cliente tiene una mascota su nombre');
            return redirect()->to('cliente')->with('error', 'El cliente tiene una mascota registrada');
        }
    }
}
