<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
        $validatedData = $request->validate([
            'name' => 'required|string',
            'dpi' => 'required|integer',
            'fecha_de_nacimiento' => 'required|date',
            'genero' => 'required|string',
            'estado_civil' => 'required|string',
            'email' => 'required|email|unique:empleados,email',
            'telefono' => 'required|integer|unique:empleados,telefono',
            'direccion' => 'required|string',
            'municipio' => 'required|string',
            'codigo_postal' => 'required|integer',
            'pais' => 'required|string',
            'puesto' => 'required|string',
            'salario' => 'required|numeric',
            'tipo_contrato' => 'required|string',
            'contacto_emergencia1' => 'required|integer',
            'contacto_emergencia2' => 'required|integer',
            'departamento_id' => 'required|exists:departamentos,id',
            'photo_employee' => 'sometimes|nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        // Guardar la imagen y almacenar la ruta en la base de datos
        $filepath = null;
        if ($request->hasFile('photo_employee')) {
            $photo = $request->file('photo_employee');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $filepath = 'uploads/empleados/' . $filename;
            Storage::disk('public')->put($filepath, file_get_contents($photo));
        }

        $empleado = new Empleado([
            'name' => $validatedData['name'],
            'dpi' => $validatedData['dpi'],
            'fecha_de_nacimiento' => $validatedData['fecha_de_nacimiento'],
            'genero' => $validatedData['genero'],
            'estado_civil' => $validatedData['estado_civil'],
            'email' => $validatedData['email'],
            'telefono' => $validatedData['telefono'],
            'direccion' => $validatedData['direccion'],
            'municipio' => $validatedData['municipio'],
            'codigo_postal' => $validatedData['codigo_postal'],
            'pais' => $validatedData['pais'],
            'puesto' => $validatedData['puesto'],
            'salario' => $validatedData['salario'],
            'tipo_contrato' => $validatedData['tipo_contrato'],
            'contacto_emergencia1' => $validatedData['contacto_emergencia1'],
            'contacto_emergencia2' => $validatedData['contacto_emergencia2'],
            'departamento_id' => $validatedData['departamento_id'],
            'photo_employee' => $filepath,
        ]);

        $empleado->save();
        return redirect()->route('empleados.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
    $departamento = $empleado->departamento;
    return view('empleados.show', compact('empleado', 'departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $departamentos = Departamento::all();
        $current_departamento = Departamento::find($empleado->departamento_id);
        return view('empleados.edit', compact('empleado', 'departamentos', 'current_departamento'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([]);

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
