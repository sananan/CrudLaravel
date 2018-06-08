<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\libro;

class libroControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros=libro::orderBy('id','DESC')->paginate(3);
        return view('libro.index',compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'nombre'=>'required', 'resumen'=>'required',
        'npagina'=>'required', 'edicion'=>'required', 'autor'=>'required', 'npagina'=>'required',
        'precio'=>'required']);
                libro::create($request->all());
        return redirect()->route('libro.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libros=Libro::find($id);
        return view('libro.show',compact('libros'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro=libro::find($id);
        return view('libro.edit',compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'nombre'=>'required', 'resumen'=>'required',
'npagina'=>'required', 'edicion'=>'required', 'autor'=>'required', 'npagina'=>'required',
'precio'=>'required']);

        libro::find($id)->update($request->all());
        return redirect()->route('libro.index')->with('success','Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        libro::find($id)->delete();
        return redirect()->route('libro.index')->with('success','Registro Eliminado');
    }

    public function getlibros(){
        
        $libros=libro::all();
        return response()->json($libros);
    }
}
