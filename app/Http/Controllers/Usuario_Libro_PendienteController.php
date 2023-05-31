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
                ->where('id_libro', $l)
                ->where('id_usuario', $u)
                ->value('id_usuario');

        // dd($resultado);

        if ($resultado == $u) {
            // dd("está el libro leído");
            return true;
        } else {
            // dd("no está libro leído");
            return false;
        }
    }

    public static function librosPendientes($u)
    {
        $libros = Libro::whereIn('id_libro', function ($query) use ($u) {
            $query->select('id_libro')
                ->from('usuario_libro_pendiente')
                ->where('id_usuario', $u);
        })
            ->get();

        // dd($libros);

        return $libros;
    }
}
