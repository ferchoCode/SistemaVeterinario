<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Raza;
use App\Models\Especie;
use App\Models\Mascota;

class ReporteController extends Controller
{
    public function index(Request $request)
    {

        // $especie=Mascota::getEspecieReporte();
        // dd($especie);
            $mascota = Mascota::with('especie','cliente')->get(); 
    
            // $especie=Especie::all();
            // $raza=Raza::all();
            return view('reporte.index',compact('mascota'));
    }

    public function searchmascota(Request $request)
    {
        if ($request->ajax()) {
            $mascota = Mascota::searchMascota($request);

            return Response(view('reporte.tabla', compact('mascota')));
        } 
    }
    // public function searchmascota(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $mascota = Mascota::searchEspecie($request);

    //         return Response(view('reporte.tabla', compact('mascota')));
    //     } 
    // }
}
