<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::latest()->paginate(5);

        return view('empleados.index', compact('empleados'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamento::all();
        return view('empleados.create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'dpi' => 'required|integer',
            'fecha_de_nacimiento' => 'required|date',
            'genero' => 'required|string',
            'estado_civil' => 'required|string',
            'email' => 'required|email|unique:empleados,email',
            'telefono' => 'required|integer|unique:empleados,telefono',
            'direccion' => 'required|string',
            //'departamento' => 'required|string',
            'municipio' => 'required|string',
            'codigo_postal' => 'required|integer',
            'pais' => 'required|string',
            'puesto' => 'required|string',
            'salario' => 'required|numeric',
            'tipo_contrato' => 'required|string',
            'contacto_emergencia1' => 'required|integer',
            'contacto_emergencia2' => 'required|integer',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);

        Empleado::create($request->all());

        return redirect()->route('empleados.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $empleado->update($request->all());

        return redirect()->route('empleados.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Product deleted successfully');
    }
}
