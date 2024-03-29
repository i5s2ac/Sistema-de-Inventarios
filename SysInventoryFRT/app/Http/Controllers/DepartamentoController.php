<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\Empleado; // Importa el modelo Empleado


class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::latest()->paginate(5);

        return view('departamentos.index', compact('departamentos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()

    {
        $empleados = Empleado::all(); // Obtén todos los empleados
        return view('departamentos.create', compact('empleados')); // Pasa la variable $empleados a la vista
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Departamento::create($request->all());

        return redirect()->route('empleados.create')
            ->with('success', 'Departamento creado con éxito.');
    }

    public function show(Departamento $departamento)
    {
        return view('departamentos.show', compact('departamento'));
    }

    public function edit(Departamento $departamento)
    {
        return view('departamentos.edit', compact('departamento'));
    }

    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            //'encargado' => 'required',
        ]);

        $departamento->update($request->all());

        return redirect()->route('departamentos.index')
            ->with('success', 'Departamento actualizado con éxito.');
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();

        return redirect()->route('departamentos.index')
            ->with('success', 'Departamento eliminado con éxito.');
    }
}
