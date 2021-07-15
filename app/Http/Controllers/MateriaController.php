<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    private $rules;

    public function __construct()
    {

        $this->rules = [
            'creditos' => ['required', 'integer', 'min:1'],
            'nombre' => 'required|string',
            'profesor' => 'string|required',
            'turno' => 'string|required',
            'disponible' => 'required|boolean',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = Materia::all();
        return view('Materia.materiaIndex', compact('materias') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$materias = app('App\Http\Controllers\MateriaController')->getMaterias();

        return view('Materia.materiaForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->validate($this->rules);
        Materia::create($request->all());

        return redirect()->route('materia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        return view('Materia.materiaShow', compact('materia') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit(Materia $materia)
    {
        //$materias = app('App\Http\Controllers\MateriaController')->getMaterias();

        return view('Materia.materiaForm', compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materia $materia)
    {
        //$request->validate($this->rules);

        Materia::where('id', $materia->id)->update($request->except('_token', '_method'));

        return redirect()->route('materia.show', $materia);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia)
    {
        $materia->delete();

        return redirect()->route('materia.index');
    }

    public function getMaterias()
    {
        return Materia::all();
    }
}
