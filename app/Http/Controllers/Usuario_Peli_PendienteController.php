<?php

namespace App\Http\Controllers;

use App\Pelicula;
use App\User;
use App\Usuario_Peli_Pendiente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class Usuario_Peli_PendienteController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }

    public function store()
    {
        //dd($_POST);

        $id_p = $_POST['peli'];
        $id_u = $_POST['user'];
        // dd($id_p, $id_u);

        DB::table('usuario_peli_pendiente')->insert([
            'id_usuario' => $id_u,
            'id_peli' => $id_p
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

        DB::table('usuario_peli_pendiente')
            ->where('id_usuario', $id_u)
            ->where('id_peli', $id_p)
            ->delete();

        // Volver a la vista de película
        $pelicula = Pelicula::findOrFail($id_p);
        // dd($pelicula);
        return view('pelicula.show', ['pelicula' => $pelicula]);
    }

    public static function comprobarPendiente($u, $p)
    {
        $resultado = DB::table('usuario_peli_pendiente')
            ->where('id_peli', $p)
            ->where('id_usuario', $u)
            ->value('id_usuario');

        // dd($resultado);

        if ($resultado == $u) {
            // dd("está la peli pendiente");
            return true;
        } else {
            // dd("no está la peli pendiente");
            return false;
        }
    }

    public static function pelisPendientes($u)
    {
        $peliculas = Pelicula::whereIn('id_peli', function ($query) use ($u) {
            $query->select('id_peli')
                ->from('usuario_peli_pendiente')
                ->where('id_usuario', $u);
        })
            ->get();

        // dd($peliculas);

        return $peliculas;
    }
}
