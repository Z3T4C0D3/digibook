<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;

class CategoriasController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-categoria|crear-categoria|editar-categoria|borrar-categoria', ['only' => ['index']]);
         $this->middleware('permission:crear-categoria', ['only' => ['create','store']]);
         $this->middleware('permission:editar-categoria', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-categoria', ['only' => ['destroy']]);
    }
    /**
     * Show the form for creating the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $categorias=Categorias::all();
        return view("categorias.index",compact('categorias'));
    }

    public function create()
    {
        return view("categorias.create");
    }

    /**
     * Store the newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            "descripcion"=>"required|min:3|max:100",
            ],[],["name"=>"descripcion","content"=>"contenido"]);
        Categorias::Create(['descripcion'=>$request->descripcion,]);
        return redirect()->route('categories.index');
    }

    /**
     * Display the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorias $category)
    {
        return view('categorias.update',compact('category'));
    }

    /**
     * Update the resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Categorias $category)
    {
        $request->validate([
            "descripcion"=>"required|min:3|max:100",
            ],[],["name"=>"descripcion","content"=>"contenido"]);
        $category->update(['descripcion'=>$request->descripcion,]);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorias $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
