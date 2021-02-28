<?php

namespace App\Http\Controllers;

use App\Models\Salario;
use App\Models\Vacante;
use App\Models\Categoria;
use App\Models\Ubicacion;
use App\Models\Experiencia;
use Illuminate\Http\Request;
use Database\Seeders\CategoriaSeed;
use Illuminate\Support\Facades\File;

class VacanteController extends Controller
{
    /*
    public function __construct(){
        //revisar si el usuario esta authenticado (y verificado)
        $this->middleware('auth');
    }
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vacantes = Vacante::where('user_id', auth()->user()->id)->latest()->simplePaginate(10);
        return view('vacantes.index', compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Consultas
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();

        return view('vacantes.create')
            ->with('categorias', $categorias)
            ->with('experiencias', $experiencias)
            ->with('ubicaciones', $ubicaciones)
            ->with('salarios', $salarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'titulo' => 'required|min:8',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'descripcion' => 'required|min:50',
            'imagen' => 'required',
            'skills' => 'required'
        ]);

        //almacenar en la bbdd
        auth()->user()->vacantes()->create([
            'titulo' => $data['titulo'],
            'categoria_id' => $data['categoria'],
            'experiencia_id' => $data['experiencia'],
            'ubicacion_id' => $data['ubicacion'],
            'salario_id' => $data['salario'],
            'descripcion' => $data['descripcion'],
            'imagen' => $data['imagen'],
            'skills' => $data['skills'],
        ]);

        return redirect()->action('App\Http\Controllers\VacanteController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        //
        if($vacante->activa === 0) return abort(404);

        return view('vacantes.show')
            ->with('vacante', $vacante);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        //manda la autorizacion al policy con el 'metodo' y el $parametro
        $this->authorize('view', $vacante);

        //Consultas
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();

        return view('vacantes.edit')
            ->with('categorias', $categorias)
            ->with('experiencias', $experiencias)
            ->with('ubicaciones', $ubicaciones)
            ->with('salarios', $salarios)
            ->with('vacante', $vacante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {
        //manda la autorizacion al policy con el 'metodo' y el $parametro
        $this->authorize('update', $vacante);

        // Validacion
        $data = $request->validate([
            'titulo' => 'required|min:8',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'descripcion' => 'required|min:50',
            'imagen' => 'required',
            'skills' => 'required'
        ]);

        //tomar los datos de la edicion
        $vacante->titulo = $data['titulo'];
        $vacante->categoria_id = $data['categoria'];
        $vacante->experiencia_id = $data['experiencia'];
        $vacante->ubicacion_id = $data['ubicacion'];
        $vacante->skills = $data['skills'];
        $vacante->salario_id = $data['salario'];
        $vacante->imagen = $data['imagen'];
        $vacante->descripcion = $data['descripcion'];

        $vacante->save();

        return redirect()->action('App\Http\Controllers\VacanteController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante, Request $request)
    {
        //manda la autorizacion al policy con el 'metodo' y el $parametro
        $this->authorize('delete', $vacante);

        //
        //return response()->json($request);
        //return response()->json($vacante);
        $vacante->delete();

        return response()->json(['mensaje' => 'Se elimino la vacante ' . $vacante->titulo]);
    }

    public function imagen (Request $request)
    {
        $imagen = $request->file('file');
        $nombreImagen = time() . '.' . $imagen->extension();
        $imagen->move(public_path('storage/vacantes'), $nombreImagen);
        return response()->json(['correcto' => $nombreImagen]);
    }

    public function borrarimagen(Request $request)
    {
        if($request->ajax()){
            $imagen = $request->get('imagen');
            if(File::exists('storage/vacantes/' . $imagen)){
                File::delete('storage/vacantes/' . $imagen);
            }

            return response('Imagen eliminada', 200);
        }
    }

    //cambia el estado de la vacante
    public function estado(Request $request, Vacante $vacante)
    {
        //leer el nuevo estado de la vacante
        $vacante->activa = $request->estado;

        //guardar el nuevo estado en la base de dato
        $vacante->save();

        return response()->json($vacante);
    }

    public function buscar(Request $request)
    {
        //validacion
        $data = $request->validate([
            'categoria' => 'required',
            'ubicacion' => 'required'
        ]);

        //selecionar los datos buscados
        $categoria = $data['categoria'];
        $ubicacion = $data['ubicacion'];

        $vacantes = Vacante::where([
            'categoria_id' => $categoria,
            'ubicacion_id' => $ubicacion
            ])->get();

        return view('buscar.index', compact('vacantes'));
    }

    public function resultados()
    {
        return 'monstrando resultados';
    }
}
