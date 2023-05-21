<?php

namespace App\Http\Controllers;

use App\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Usuario_Libro_PendienteController extends Controller
{
    public function store()
    {
        //dd($_POST);

        $id_l = $_POST['libro'];
        $id_u = $_POST['user'];
        // dd($id_l, $id_u);

        DB::table('usuario_libro_pendiente')->insert([
            'id_usuario' => $id_u,
            'id_libro' => $id_l
        ]);

        // Volver a la vista del libro
        $libro = Libro::findOrFail($id_l);
        // dd($libro);
        return view('libro.show', ['libro' => $libro]);
    }

    public function borrar()
    {
        // dd($_POST);

        $id_l = $_POST['libro'];
        $id_u = $_POST['user'];
        // dd($id_l, $id_u);

        DB::table('usuario_libro_pendiente')
            ->where('id_usuario', $id_u)
            ->where('id_libro', $id_l)
            ->delete();

        // Volver a la vista del libro
        $libro = Libro::findOrFail($id_l);
        // dd($libro);
        return view('libro.show', ['libro' => $libro]);
    }

    public static function comprobarPendiente($u, $l)
    {
        $resultado = DB::table('usuario_libro_pendiente')
            ->select('id_usuario')
            ->where('id_libro', '=', $l)
            ->get();

        // dd($resultado);

        if (empty($resultado[0])) {
            // dd("no está libro pendiente");
            return false;
        } else {
            // dd("está el libro pendiente");
            return true;
        }
    }
}
