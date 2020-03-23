<?php

namespace App\Http\Controllers;

use App\Docente;
use App\Http\Requests\ActualizarDocenteRequest;
use App\Http\Resources\DocenteResource;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = Docente::with('departamento')->paginate(10);

        return view('Admin.Docentes.index', compact('docentes'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarDocenteRequest $request)
    {
        $datos_validados = $request->validated();
        $id = $request->docente_id;
        $docente = Docente::findOrFail($id);

        $docente->fill($datos_validados);
        $docente->save();

        $docentes = Docente::with('departamento')->paginate(10);

        return DocenteResource::collection($docentes);
    }

    public function encontrar(Request $request)
    {
        $docente = Docente::findOrFail($request->docente_id);

        return new DocenteResource($docente);
    }

    public function eliminar(Request $request)
    {
        $docente = Docente::findOrFail($request->docente_id);

        $docente->delete();

        $docentes = Docente::with('departamento')->paginate(10);

        return DocenteResource::collection($docentes);
    }

    public function busqueda(Request $request)
    {
        $search = $request->search;
        $docentes = docente::query()
            ->whereLike(['nombre', 'numero_empleado'], $search)
            ->get()->take(4);
        $response = [];
        foreach ($docentes as $docente) {
            $response[] = [
                'id' => $docente->id,
                'text' => $docente->nombre.' '.$docente->numero_empleado,
            ];
        }
        echo json_encode($response);
        exit;
    }
}
