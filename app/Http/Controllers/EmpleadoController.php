<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleados']=Empleado::paginate(50);
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleado.create');
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
            'Apellido'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Cedula'=>'required|string|max:100',
            'date'=>'required|string|max:100'
        ];
        
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request,$campos,$mensaje);

        // $datosEmpleado = request()->all();
        $datosEmpleado = request()->except('_token');
        
        Empleado::insert($datosEmpleado); 

        //return response()->json($datosEmpleado);
        return redirect('empleado')->with('mensaje','Empleado agregado con exito');
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

        $empleado=Empleado::findOrFail($id);

        return view('empleado.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Cedula'=>'required|string|max:100',
            'date'=>'required|string|max:100'

        ];
        
        $mensaje=[
            'required'=>'El :attribute es requerido',
            
        ];
      
        $this->validate($request,$campos,$mensaje);

        $datosEmpleado = request()->except(['_token','_method']);
        
        Empleado::where('id','=',$id)->update($datosEmpleado);
          $empleado=Empleado::findOrFail($id);

        //return view('empleado.edit',compact('empleado'));
        return redirect('empleado')->with('mensaje','Empleado Modificado');
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
        $empleado=Empleado::findOrFail($id);

        Empleado::destroy($id);

        return redirect('empleado')->with('mensaje','Empleado borrado');
    }
}
