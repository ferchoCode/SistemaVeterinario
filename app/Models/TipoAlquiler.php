<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAlquiler extends Model
{
    use HasFactory;
    protected $table="tipo_alquilers";
    protected $fillable=[
        'nombre',
        'descripcion',
        'estado'
    ];
    public static function getTipoAlquiler(){
        return self::where('estado','!=',0)->paginate(10);
    }

    public static function getTipoAlquilerSelect(){
        return self::where('estado','!=',0)->get();
    }

    public static function findTipoAlquiler($id){
        return self::findOrFail($id);
    }

    public static function guardarTipoAlquiler($request){
        $tipo_alquiler=new TipoAlquiler;
        $tipo_alquiler->nombre=$request->nombre;
        $tipo_alquiler->descripcion=$request->descripcion;
        $tipo_alquiler->save();
    }
    public static function editarTipoAlquiler($request,$id){
        $tipo_alquiler=TipoAlquiler::findOrFail($id);
        $tipo_alquiler->nombre=$request->nombre;
        $tipo_alquiler->descripcion=$request->descripcion;
        $tipo_alquiler->update();
    }
}
