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
            ->where('id_serie', $s)
            ->where('id_usuario', $u)
            ->value('id_usuario');

        // dd($resultado);

        if ($resultado == $u) {
            // dd("está la serie vista");
            return true;
        } else {
            // dd("no está la serie vista");
            return false;
        }
    }

    public static function seriesVistas($u)
    {
        $series = Serie::whereIn('id_serie', function ($query) use ($u) {
            $query->select('id_serie')
                ->from('usuario_serie_vista')
                ->where('id_usuario', $u);
        })
            ->get();

        // dd($series);

        return $series;
    }
}
