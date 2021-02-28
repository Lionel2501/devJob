<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Candidato;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //obtener el id actual
        $id_vacante = $request->route('id');

        //obtener los candidatos y la vacante
        $vacante = Vacante::findOrFail($id_vacante);

        $this->authorize('view', $vacante);

        return view('candidatos.index')->with('vacante', $vacante);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacion
        $data = $request->validate([
            'nombre' => 'required|min:3',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf|max:1000',
            'vacante_id' => 'required'
        ]);

        //almacenar el archivo pdf
        if($request->file('cv'))
        {
            $archivo = $request->file('cv');
            $nombreArchivo = time() . "." . $archivo->extension();
            $ubicacion = public_path('/storage/cv');
            $archivo->move($ubicacion, $nombreArchivo);
        }

        $vacante = Vacante::find($data['vacante_id']);

        $vacante->candidatos()->create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'cv' => $nombreArchivo
        ]);
        $reclutador = $vacante->reclutador;
        $reclutador->notify(new \App\Notifications\NuevoCandidato($vacante->titulo, $vacante->id) );

        //una forma
        //$candidato = new Candidato;
        //$candidato->nombre = $data['nombre'];
        //$candidato->email = $data['email'];
        //$candidato->vacante_id = $data['vacante_id'];
        //$candidato->cv = '123.pdf';

        //segunda forma (agregando fillable al model candidato)
        $candidato = new Candidato($data);
        $candidato->cv = $nombreArchivo;

        //3era forma
        //$candidato = new Candidato;
        //$candidato->fill($data);
        //$candidato->cv = '123.pdf';

        $candidato->save();

        return back()->with('estado', 'tu archivo se envio corectamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
        return 'desde candidato show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
