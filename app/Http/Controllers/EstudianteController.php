<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Materia;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    private $rules;

    public function __construct()
    {

        $this->rules = [
            'nombre' => ['required', 'string', 'min:3', 'max:255'],
            'codigo' => 'required|integer|digits:9|unique:App\Models\Estudiante,codigo',
            'carrera' => 'string',
            'creditos_cursados' => 'integer|min:0',
            'correo' => 'required|email|unique:App\Models\Estudiante,correo',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $estudiantes = Estudiante::all();
        return view('Estudiante.estudianteIndex', compact('estudiantes') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Estudiante.estudianteForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);
        Estudiante::create($request->all());

        return redirect()->route('estudiante.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        $materias = app('App\Http\Controllers\MateriaController')->getMaterias();

        return view('Estudiante.estudianteShow', compact('estudiante', 'materias') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        return view('Estudiante.estudianteForm', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate($this->rules);

        Estudiante::where('id', $estudiante->id)->update($request->except('_token', '_method'));

        return redirect()->route('estudiante.show', $estudiante);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('estudiante.index');
    }

    public function addMateria(Request $request, Estudiante $estudiante)
    {
        $materiaRepetida = $estudiante->materias()->find($request->materia_id); //Si retorna un materia existente quiere decir que el materia a agregar ya se encontraba en el carrito anteriormente

        if(! $materiaRepetida)
        {
            $estudiante->materias()->attach($request->materia_id);
        }

        return redirect()->route('estudiante.index');
    }

    public function deleteMateria(Materia $materia, Estudiante $estudiante)
    {
        $estudiante->materias()->detach($materia->id);

        return redirect()->route('estudiante.index');
    }
}
