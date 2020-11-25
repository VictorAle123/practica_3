<?php

namespace App\Http\Controllers;

use App\productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null){
        if($id)

        return response()->json(["productos"=>productos::find($id)],200);


        return response()->json(["productos"=>productos::all()],200);

    }
    public function guardar(Request $request){

        $productos = new productos();
        $productos->Nombre = $request->Nombre;


        if($productos->save())

        return response()->json(["productos"=>$productos],201);
        return response()->json(null,400);

    }

    public function eliminar($id)
    {


    
            $productos = productos::find($id);
    
    
            if($productos->delete()) {
                return response()->json(["productos"=>productos::all()],200);
    

    }
}


    public function modificar (Request $request, $id) {


        $productos = new productos();
        $productos = productos::find($id);

        $productos->producto = $request->producto;


        if($productos->update()){

            
        return response()->json(["productos"=>$productos],201);

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
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(productos $productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productos $productos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(productos $productos)
    {
        //
    }
}
