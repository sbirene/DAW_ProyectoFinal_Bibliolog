<?php

namespace App\Http\Controllers;

use App\Capitulo;
use Illuminate\Http\Request;

class CapituloController extends Controller
{
    //
    public static function obtenerCapituloTemporada($temporada)
    {
        return $capitulos = Capitulo::where('id_temporada', '=', $temporada)->get();
    }

    // Para estadísticas
    // Duración de todos los capítulos vistos
    public static function totalMinutosVistos($u)
    {
        $currentYear = date('Y');

        $totalMin = Capitulo::whereIn('id_cap', function ($query) use ($u, $currentYear) {
            $query->select('id_cap')
                ->from('usuario_cap_visto')
                ->whereYear('created_at', $currentYear)
                ->where('id_usuario', $u);
        })
        ->sum('duracion');
        // dd($totalMin);

        return $totalMin;
    }
}
