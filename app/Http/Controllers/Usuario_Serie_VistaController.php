<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Usuario_Serie_VistaController extends Controller
{
    public function store()
    {
        //dd($_POST);

        $id_s = $_POST['serie'];
        $id_u = $_POST['user'];
        // dd($id_s, $id_u);

        DB::table('usuario_serie_vista')->insert([
            'id_usuario' => $id_u,
            'id_serie' => $id_s,
            'created_at' => Carbon::now()
        ]);

        // Volver a la vista de serie
        $serie = Serie::findOrFail($id_s);
        // dd($serie);
        return view('serie.show', ['serie' => $serie], ['id' => $serie->id_serie]);
    }

    public function borrar()
    {
        // dd($_POST);

        $id_s = $_POST['serie'];
        $id_u = $_POST['user'];
        // dd($id_s, $id_u);

        DB::table('usuario_serie_vista')
            ->where('id_usuario', $id_u)
            ->where('id_serie', $id_s)
            ->delete();

        // Volver a la vista de serie
        $serie = Serie::findOrFail($id_s);
        // dd($serie);
        return view('serie.show', ['serie' => $serie], ['id' => $serie->id_serie]);
    }

    public static function comprobarVista($u, $s)
    {
        $resultado = DB::table('usuario_serie_vista')
            ->select('id_usuario')
            ->where('id_serie', '=', $s)
            ->get();

        // dd($resultado);

        if (empty($resultado[0])) {
            // dd("no está la serie vista");
            return false;
        } else {
            // dd("está la serie vista");
            return true;
        }
    }
}
