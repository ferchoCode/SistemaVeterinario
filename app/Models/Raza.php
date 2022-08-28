<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    use HasFactory;
    protected $table = "raza";
    protected $fillable = [
        'nombre',
        'descripcion',
        'especie_id',
        'estado',

    ];
    public static function getEspecie($id)
    {
        // return self::join('especie','raza.especie_id','especie.id')
        // ->select('raza.nombre','raza.id') 
        // ->where('raza.especie_id',1)->pluck('cliente.nombre','id')->toArray();

        return self::join('especie','raza.especie_id','especie.id')
        ->select('raza.nombre','raza.id') 
        ->where('raza.especie_id',$id)->get();
    }



    public static function saveRaza($request){
        $raza= new Raza;
        $raza->nombre=$request->nombre;
        $raza->descripcion=$request->descripcion;
        $raza->especie_id=$request->especie_id;
        $raza->save();
    }
    public static function updateRaza($request,$id){
        $raza=Raza::findOrFail($id);
        $raza->nombre=$request->nombre;
        $raza->descripcion=$request->descripcion;
        $raza->especie_id=$request->especie_id;
        $raza->update();
    }


    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }
}
