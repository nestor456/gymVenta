<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Membresia;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['clientes'] = Cliente::paginate(10);
        return view('cliente.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $empleados = Empleado::all();
        $menbresias = Membresia::all();
        return view('cliente.create', compact('empleados','menbresias'));
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
        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'dni'=>'required|string|max:8',
            'Telefono'=>'required|string|max:9',
            'Correo'=>'required|email',
            //'Membresia'=>'required|string|max:100',
            'Entrenador'=>'required|string|max:100',
            'Objetivo_fisico'=>'required|string|max:100',
            'Fecha_Inicio'=>'required|string|',
            'Fecha_Final'=>'required|string|',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto requerida'
        ];
        $this->validate($request, $campos, $mensaje);
        $datosCliente = request()->except('_token'); 
        Cliente::insert($datosCliente);
        return redirect('cliente')->with('mensaje','Cliente agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cliente = Cliente::findOrFail($id);
        $empleados = Empleado::all();
        $menbresias = Membresia::all();
        return view('cliente.edite', compact('cliente','empleados','menbresias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosCliente = request()->except(['_token','_method']);
        Cliente::where('id','=',$id)->update($datosCliente);
        return redirect('cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $id)
    {
        //
        Cliente::destroy($id);
        return redirect('cliente')->with('mensaje','Cliente Borrado');
    }
}
