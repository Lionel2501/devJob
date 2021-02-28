<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function show(Categoria $categoria)
    {
        //llamar las vacantes donde el id
        $vacantes = Vacante::where('categoria_id', $categoria->id)->where('activa', 1)->get();

        return view('categorias.show', compact('vacantes', 'categoria'));
    }
}
