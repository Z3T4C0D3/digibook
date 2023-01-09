<?php

namespace App\Http\Controllers;

use App\Models\Prestamos;
use Illuminate\Http\Request;
use App\Models\Copias;
use App\Models\Libros;

class PrestamosController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-prestamo|crear-prestamo|editar-prestamo|borrar-prestamo', ['only' => ['index']]);
         $this->middleware('permission:crear-prestamo', ['only' => ['create','store']]);
         $this->middleware('permission:editar-prestamo', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-prestamo', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* 
            SELECT 
                estantes.id,
                users.name,
                libros.titulo,
                ejemplares.num_copia
            from estantes
                INNER JOIN users on users.id=estantes.users_id
                INNER JOIN ejemplares on ejemplares.id=estantes.ejemplares_id
                INNER JOIN libros on libros.id=ejemplares.libros_id;

                SELECT 
                prestamos.id,
                users.name,
                libros.titulo,
                copias.copia
            from prestamos
                INNER JOIN users on users.id=prestamos.users_id
                INNER JOIN copias on copias.id=prestamos.copias_id
                INNER JOIN libros on libros.id=prestamos.copias_id;
        */
        
        $prestamo=Prestamos::join("users","users.id","=","prestamos.users_id")
            ->join("copias","copias.id","=","prestamos.copias_id")
            ->join("libros","libros.id","=","copias.libros_id")
            ->select("prestamos.id","users.name","libros.titulo","copias.copia")
            ->orderby("prestamos.id")
            ->get();
        return view("prestamos.index",compact('prestamo'));
    } 

    /**
     * Show the form for creating a new resource .
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $libros = Libros::all()->toJson(JSON_PRETTY_PRINT);
        
        /* $copias=ejemplares::where('libros_id', )->get(); */
        $copias =Copias::all()->toJson(JSON_PRETTY_PRINT);

        //dd($libros);
       

        return view("prestamos.create",compact('libros','copias'));
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
        
        Prestamos::Create(['users_id'=>$request->users_id,
                          'ejemplares_id'=>$request->ejemplares_id, ]);
        return redirect()->route('loans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamos $prestamos)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamos $loan)
    {
         
        $libros = Libros::all()->toJson(JSON_PRETTY_PRINT);
        
        /* $copias=ejemplares::where('libros_id', )->get(); */
        $copias = Copias::all()->toJson(JSON_PRETTY_PRINT);
        return view("prestamos.update",compact("loan","libros","copias"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamos $loan)
    {
        $request->validate([
            "usuarios_id"=>"required", //buscar su validacion
            "libros_id"=>"required",   //buscar su validacion
            ],[],["name"=>"nombre","content"=>"contenido"]);

        $loan->update(['users_id'=>$request->id_usuarios,
                          'libros_id'=>$request->id_libros]);
        return redirect()->route('loans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamos $loan)
    {
        $loan->delete();
        return redirect()->route("loans.index");
    }
}
