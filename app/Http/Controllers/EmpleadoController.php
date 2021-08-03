<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $texto = trim($request->get('texto'));

       $empleados = DB::table('empleados')
                    ->select('id','Nombre','ApellidoPaterno','ApellidoMaterno','dni','Telefono','Correo','Domicilio','Area')
                    ->where('ApellidoPaterno','LIKE','%'.$texto.'%')
                    ->orwhere('dni','LIKE','%'.$texto.'%')
                    ->orderBy('ApellidoPaterno','asc')
                    ->paginate(5);

       //echo $empleado;


        //$datos['empleados']=Empleado::paginate(5);
        //return view('empleado.index',$empleados);
        return view('empleado.index',compact('empleados','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $areas = Area::all();
        return view('empleado.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'dni'=>'required|string|max:8',
            'Telefono'=>'required|string|max:9',
            'Correo'=>'required|email',
            'Domicilio'=>'required|string|max:100',
            'Area'=>'required|',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto requerida'
        ];
        $this->validate($request, $campos, $mensaje);     

        //$datosEmpleado = request()->all(); 
        $datosEmpleado = request()->except('_token'); 

        Empleado::insert($datosEmpleado);  

        return redirect('empleado')->with('mensaje','Empleado agregado'); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $areas = Area::all();
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edite', compact('empleado','areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'dni'=>'required|string|max:8',
            'Telefono'=>'required|string|max:9',
            'Correo'=>'required|email',
            'Domicilio'=>'required|string|max:100',
            'Area'=>'required|',
            'Foto'=>'required|max:10000|dimensions:min_width=100,min_height=200',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto requerida'
        ];
        $this->validate($request, $campos, $mensaje);
        
        $datosEmpleado = request()->except(['_token','_method']);

       if($request->hasFile('Foto')){

            $empleado = Empleado::findOrFail($id);

            Storage::delete('public/'.$empleado->Foto);

            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Empleado::where('id','=',$id)->update($datosEmpleado);
        return redirect('empleado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Empleado::destroy($id);
        
        return redirect('empleado')->with('mensaje','Empleado Borrado');
    }
}
