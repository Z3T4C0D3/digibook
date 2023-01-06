<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editoriales;

class EditorialesController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:ver-editorial|crear-editorial|editar-editorial|borrar-editorial', ['only' => ['index']]);
         $this->middleware('permission:crear-editorial', ['only' => ['create','store']]);
         $this->middleware('permission:editar-editorial', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-editorial', ['only' => ['destroy']]);
    }
    /**
     * Show the form for creating the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editoriales=Editoriales::all();
        return view("editoriales.index",compact('editoriales'));
    }

    public function create()
    {
        return view("editoriales.create");
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
        Editoriales::Create(['descripcion'=>$request->descripcion,]);
        return redirect()->route('publishers.index');
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
    public function edit(Editoriales $publisher)
    {
        return view('editoriales.update',compact('publisher'));
    }

    /**
     * Update the resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Editoriales $publisher)
    {
        $request->validate([
            "descripcion"=>"required|min:3|max:100",
            ],[],["name"=>"descripcion","content"=>"contenido"]);
        $publisher->update(['descripcion'=>$request->descripcion,]);
        return redirect()->route('publishers.index');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Editoriales $publisher)
    {
        $publisher->delete();
        return redirect()->route('publishers.index');
    }
}
