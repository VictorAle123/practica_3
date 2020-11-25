<?php

namespace App\Http\Controllers;

use App\personas;
use Illuminate\Http\Request;
use \Mailjet\Resources;


class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
public function registro(Request $request)

{

$request->validate([

    'name' => 'required',
    'email' => 'required|email',
    'password'=> 'required',
   
]);


$user           = new User();
$user->name     =$request->name;
$user->email    =$request->email;
$user->password = hash::make($request->password);

if($user->save())
return response()->json($user,200);


return abort(422,"fallo al insertar");


}



public function index($id = null){


    if($id)

    return response()->json(["comentarios"=>personas::find($id)],200);


    return response()->json(["comentarios"=>personas::all()],200);


}



public function guardar(Request $request){

    $personas = new personas();

    $personas->usuario = $request->usuario;
    
    $personas->contrasena = $request->contrasena;

    
    if($personas->save())

    return response()->json(["personas"=>$personas],201);
    return response()->json(null,400);

}


public function eliminar($id)
{

        $comentarios = personas::find($id);

        if($comentarios->delete()) {
            return response()->json(["personas"=>personas::all()],200);


}





}



public function modificar (Request $request, $id) {

$personas = new personas();
$personas = personas::find($id);

$personas->usuario = $request->usuario;

$personas->contrasena = $request->contrasena;


if($personas->update()){

return response()->json(["personas"=>$personas],201);

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
     * @param  \App\personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show(personas $personas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit(personas $personas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, personas $personas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy(personas $personas)
    {
        //
    }
}
