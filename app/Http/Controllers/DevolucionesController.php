<?php

namespace App\Http\Controllers;

use App\Models\Devoluciones;
use Illuminate\Http\Request;
use App\Models\Prestamos;

class DevolucionesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-devolucion|crear-devolucion|editar-devolucion|borrar-devolucion', ['only' => ['index']]);
         $this->middleware('permission:crear-devolucion', ['only' => ['create','store']]);
         $this->middleware('permission:editar-devolucion', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-devolucion', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devoluciones=Devoluciones::all();
         return view('devoluciones.index',compact("devoluciones"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prestamos=Prestamos::where('users_id',auth()->user()->id)->get();
        
        return view('devoluciones.create',compact('prestamos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        Devoluciones::Create($request->all());
        return redirect()->route('returns.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Devoluciones  $devoluciones
     * @return \Illuminate\Http\Response
     */
    public function show(Devoluciones $devoluciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Devoluciones  $devoluciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Devoluciones $devoluciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Devoluciones  $devoluciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Devoluciones $devoluciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Devoluciones  $devoluciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devoluciones $return)
    {
        $return->delete();
        return redirect()->route('returns.index');
    }
}
