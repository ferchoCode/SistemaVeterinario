<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;
    protected $table = "mascota";
    protected $fillable = [
        'nombre',
        'edad',
        'sexo',
        // 'especie_id',
        'raza_id',
        'cliente_id',
        'estado',

    ];
    public static function searchMascota($request){
          // return self::join('especie','raza.especie_id','especie.id')
        // ->select('raza.nombre','raza.id') 
        // ->where('raza.especie_id',1)->pluck('cliente.nombre','id')->toArray();
        // if($request->opcion ='Nombre'){
            return self::where($request->input('opcion'), 'LIKE', '%' . $request->input('valor') . '%')->get();
        // }else{
        //     return self::join('especie','mascota.especie_id','especie.id')
        //     ->where($request->input('opcion'), 'LIKE', '%' . $request->input('valor') . '%')->get();
        // }
    }
    public static function getEspecieReporte(){
        return self::join('cliente','mascota.cliente_id','cliente.id')
        ->join('raza','raza.id','mascota.raza_id')
        ->join('especie','especie.id','raza.especie_id')
        ->select('cliente.nombre','cliente.apellido','mascota.nombre','especie.nombre','raza.nombre')
        ->get();
    }

    public static function conbrobarcliente($id){
        return self::select('mascota.cliente_id')
        ->where('mascota.cliente_id',$id)->get();
    }

    public static function saveMascota($request){
        $mascota = new Mascota;
        $mascota->nombre=$request->nombre;
        $mascota->edad=$request->edad;
        $mascota->sexo=$request->sexo;
        // $mascota->especie_id=$request->especie_id;
        $mascota->raza_id=$request->raza_id;
        $mascota->cliente_id=$request->cliente_id;
        $mascota->save();
    }
    public static function updateMascota($request,$id){
        $mascota=Mascota::findOrFail($id);
        
        $mascota->nombre=$request->nombre;
        $mascota->edad=$request->edad;
        $mascota->sexo=$request->sexo;
        // $mascota->especie_id=$request->especie_id;
        $mascota->cliente_id=$request->clienteid;
        $mascota->raza_id=$request->razaid;
        $mascota->update();

    }
    public function especie()
    {
        return $this->belongsTo(Especie::class);
       
    }
    public function raza()
    {
        return $this->belongsTo(Raza::class);
       
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
