<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autores;

class AutoresController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:ver-autor|crear-autor|editar-autor|borrar-autor', ['only' => ['index']]);
         $this->middleware('permission:crear-autor', ['only' => ['create','store']]);
         $this->middleware('permission:editar-autor', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-autor', ['only' => ['destroy']]);
    }
    /**
     * Show the form for creating the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores=Autores::all();
        return view("autores.index",compact('autores'));
    }
    public function create()
    {
        return view("autores.create");
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
            "nombre"=>"required|min:3|max:100",
            ],[],["name"=>"nombre","content"=>"contenido"]);
        Autores::Create(['nombre'=>$request->nombre,]);
        return redirect()->route('authors.index');
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
    public function edit(Autores $author)
    {
        return view("autores.update",compact('author'));
    }

    /**
     * Update the resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Autores $author)
    {
        $request->validate([
            "nombre"=>"required|min:3|max:100|unique:autores",
            ],[],["name"=>"nombre","content"=>"contenido"]);
        $author->update(['nombre'=>$request->nombre,]);
        return redirect()->route('authors.index');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autores $author)
    {
        $author->delete();
        return redirect()->route('authors.index');
    }
}
