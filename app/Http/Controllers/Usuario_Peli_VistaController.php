<?php

namespace App\Http\Controllers;

use App\Pelicula;
use App\User;
use App\Usuario_Peli_Vista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Usuario_Peli_VistaController extends Controller
{
    //
    public function store()
    {
        //dd($_POST);

        $id_p = $_POST['peli'];
        $id_u = $_POST['user'];
        // dd($id_p, $id_u);

        DB::table('usuario_peli_vista')->insert([
            'id_usuario' => $id_u,
            'id_peli' => $id_p,
            'created_at' => Carbon::now()
        ]);

        // Volver a la vista de película
        $pelicula = Pelicula::findOrFail($id_p);
        // dd($pelicula);
        return view('pelicula.show', ['pelicula' => $pelicula]);
    }

    public function borrar()
    {
        // dd($_POST);

        $id_u = $_POST['user'];
        $id_p = $_POST['peli'];
        // dd($id_u, $id_p);

        DB::table('usuario_peli_vista')
            ->where('id_usuario', $id_u)
            ->where('id_peli', $id_p)
            ->delete();

        // Volver a la vista de película
        $pelicula = Pelicula::findOrFail($id_p);
        // dd($pelicula);
        return view('pelicula.show', ['pelicula' => $pelicula]);
    }

    public static function comprobarVista($u, $p)
    {
        $resultado = DB::table('usuario_peli_vista')
            ->select('id_usuario')
            ->where('id_peli', '=', $p)
            ->get();

        // dd($resultado);

        if (empty($resultado[0])) {
            // dd("no está la peli vista");
            return false;
        } else {
            // dd("está la peli vista");
            return true;
        }
    }
}
