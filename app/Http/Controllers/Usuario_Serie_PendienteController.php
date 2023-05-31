<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Usuario_Serie_PendienteController extends Controller
{
    public function store()
    {
        //dd($_POST);

        $id_s = $_POST['serie'];
        $id_u = $_POST['user'];
        // dd($id_s, $id_u);

        DB::table('usuario_serie_pendiente')->insert([
            'id_usuario' => $id_u,
            'id_serie' => $id_s
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

        DB::table('usuario_serie_pendiente')
            ->where('id_usuario', $id_u)
            ->where('id_serie', $id_s)
            ->delete();

        // Volver a la vista de serie
        $serie = Serie::findOrFail($id_s);
        // dd($serie);
        return view('serie.show', ['serie' => $serie], ['id' => $serie->id_serie]);
    }

    public static function comprobarPendiente($u, $s)
    {
        $resultado = DB::table('usuario_serie_pendiente')
            ->select('id_usuario')
            ->where('id_serie', '=', $s)
            ->get();

        $resultado = DB::table('usuario_serie_pendiente')
            ->where('id_serie', $s)
            ->where('id_usuario', $u)
            ->value('id_usuario');

        // dd($resultado);

        if ($resultado == $u) {
            // dd("está la serie pendiente");
            return true;
        } else {
            // dd("no está la serie pendiente");
            return false;
        }
    }

    public static function seriesPendientes($u)
    {
        $series = Serie::whereIn('id_serie', function ($query) use ($u) {
            $query->select('id_serie')
                ->from('usuario_serie_pendiente')
                ->where('id_usuario', $u);
        })
            ->get();

        // dd($series);

        return $series;
    }
}
