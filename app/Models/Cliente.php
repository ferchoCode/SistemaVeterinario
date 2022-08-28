<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = "cliente";
    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'estado',

    ];

  
    public static function saveCliente($request){
        $cliente = new Cliente;
        $cliente->nombre=$request->nombre;
        $cliente->apellido=$request->apellido;
        $cliente->direccion=$request->direccion;
        $cliente->telefono=$request->telefono;
        $cliente->save();
    }
    public static function updateCliente($request,$id){
        $cliente=Cliente::findOrFail($id);
        $cliente->nombre=$request->nombre;
        $cliente->apellido=$request->apellido;
        $cliente->direccion=$request->direccion;
        $cliente->telefono=$request->telefono;
        $cliente->update();
    }
}
