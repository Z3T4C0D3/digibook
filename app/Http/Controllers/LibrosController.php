<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use Illuminate\Http\Request;
use App\Models\Editoriales;
use App\Models\Categorias;
use App\Models\Autores;
use App\Models\AutoresLibros;
use App\Models\Copias;
use App\Models\user;
use Illuminate\Support\Facades\Storage;
 
class LibrosController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-libro|crear-libro|editar-libro|borrar-libro', ['only' => ['index']]);
         $this->middleware('permission:crear-libro', ['only' => ['create','store']]);
         $this->middleware('permission:editar-libro', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-libro', ['only' => ['destroy']]);
         $this->middleware('permission:ver-libro', ['only' => ['show']]);
    }

    public function index()
    {
        $libro=Libros::all();
        return view("libros.index",compact("libro"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $editorial=Editoriales::all();
        $categoria=Categorias::all();
        $autores=Autores::all();
        return view("libros.create",compact('editorial','categoria','autores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            "titulo"=>"required",
            "anio"=>"required",
            "descripcion"=>"required",
            "editoriales_id"=>"required",
            "file"=>"required|image|max:2048",
            ],[],["name"=>"nombre","content"=>"contenido"]);
        return Storage::put('public/libros', $request->file('file'));   

        $libro=Libros::Create($request->all());

        if ($request->file('file')) {
            $url=Storage::put('public/libros',$request->file('file'));
            $libro->image()->create([
                'url'=>$url
            ]);
        }


        foreach ($request->autores_id as $autor) {
            //dd($autor);
            $asigna_autor=AutoresLibros::firstOrCreate(['libros_id'=>$libro->id,
                        'autores_id'=>$autor]);
        }
        for($i=1;$i<=$request->num_copia;$i++){
            Copias::Create(['libros_id'=>$libro->id,'copia'=>$i,]);
        }

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function show(libros $libro)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function edit(libros $libro)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, libros $libro)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function destroy(libros $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
