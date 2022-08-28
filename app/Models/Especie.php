<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "especie";
    protected $fillable = [
        'nombre',
        'estado',

    ];
    public static function getEspecie($id)
    {
        return self::select('nombre') 
        ->where('id',$id)->get();
    }
    public static function saveEspecie($request){
        $especie=new Especie;
        $especie->nombre=$request->nombre;
        $especie->save();
    }
    public static function updateEspecie($request,$id){
        $especie=Especie::findOrFail($id);
        $especie->nombre=$request->nombre;
        $especie->update();

    }
}
