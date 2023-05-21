<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Usuario_Cap_VistoController extends Controller
{
    public function store()
    {
        //dd($_POST);

        $id_s = $_POST['serie'];
        $id_c = $_POST['cap'];
        $id_u = $_POST['user'];
        // dd($id_s, $id_c, $id_u);

        DB::table('usuario_cap_visto')->insert([
            'id_usuario' => $id_u,
            'id_cap' => $id_c,
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
        $id_c = $_POST['cap'];
        $id_u = $_POST['user'];
        // dd($id_s, $id_c, $id_u);

        DB::table('usuario_cap_visto')
            ->where('id_usuario', $id_u)
            ->where('id_cap', $id_c)
            ->delete();

        // Volver a la vista de serie
        $serie = Serie::findOrFail($id_s);
        // dd($serie);
        return view('serie.show', ['serie' => $serie], ['id' => $serie->id_serie]);
    }

    public static function comprobarVisto($u, $c)
    {
        $resultado = DB::table('usuario_cap_visto')
            ->select('id_usuario')
            ->where('id_cap', '=', $c)
            ->get();

        // dd($resultado);

        if (empty($resultado[0])) {
            // dd("no está el capítulo visto");
            return false;
        } else {
            // dd("está el capítulo visto");
            return true;
        }
    }
}
