<?php

namespace App\Http\Controllers;

use App\comentarios;
use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index($id = null){


        if($id)

        return response()->json(["comentarios"=>comentarios::find($id)],200);


        return response()->json(["comentarios"=>comentarios::all()],200);


    }

 
    public function guardar(Request $request){

        $comentarios = new comentarios();

        $comentarios->comentario = $request->comentario;
        
        $comentarios->persona = $request->persona;

        $comentarios->producto = $request->producto;
        
        if($comentarios->save())

        return response()->json(["comentarios"=>$comentarios],201);
        return response()->json(null,400);

    }


    public function eliminar($id)
    {
    
            $comentarios = comentarios::find($id);
    
            if($comentarios->delete()) {
                return response()->json(["comentarios"=>comentarios::all()],200);
    

    }


}


public function modificar (Request $request, $id) {

    $comentarios = new comentarios();
    $comentarios = comentarios::find($id);

    $comentarios->comentario = $request->comentario;

    $comentarios->persona = $request->persona;

    $comentarios->producto = $request->producto;




    if($comentarios->update()){

    return response()->json(["productos"=>$comentarios],201);

    }


}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function show(comentarios $comentarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function edit(comentarios $comentarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comentarios $comentarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(comentarios $comentarios)
    {
        //
    }
}
