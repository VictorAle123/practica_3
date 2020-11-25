<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use App\User;
use Illuminate\Support\Str;
use  Illuminate\Support\Facades\ Storage;
use \Mailjet\Resources;

class userscontroller extends Controller
{
    //


    public function Prueba(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
            ]);
            $mostrar = DB::select('SELECT users.name
            FROM users
            WHERE users.email =?',[$request->email]);
            if ($mostrar)
            {


                return response()->json(['Funciona', $mostrar], 201);
            }
            return response()->json(null,400);
    }

    public function usuario(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'image' => 'required'
            ]);
            if($request->hasFile('image'))
            {
            $path = Storage::disk('local')->putFile('perfil/', $request->image);
            }
            $user = new User();
            $user->name = $request->name;
            $user->age = $request->age;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'user';
            $user->image = $path;
            $user->confirmed = false;
            $user->confirmation_code = Str::random(20);

        if ($user->save())
        {
            $datos = array(
                'email'=> $user->email,
                'name'=> $user->name,
                'confirmation_code'=> $user->confirmation_code
            );
            Mail::send('Verificar', $datos, function($message) use ($datos) {
                $message->from('19170170@utt.edu.mx', 'Victor Alejandro Escobedo');
                $message->to($datos['email'], $datos['name'])->subject('confirmar correo');
            });
        return response()->json(["Usuario registrado", $user], 201);
        }
        return  response()->json("Error de registro ", 400);
    }

    public function Verificar($code)
    {
        $user = User::where('confirmation_code', $code)->first();
        if($user)
        {
        $user->confirmed = true;
        $user->confirmation_code = null;
        $user->save();
        }
    }



    public function LogIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
            ]);
            $user = User::where('email', $request->email)->first();
            $user2 = User::where([
                ['confirmed', '=', '0'],
                ['email', $request->email],
            ])->first();
            if (! $user || ! Hash::check($request->password, $user->password)) 
            {
                return response()->json('Datos erroneos', 400);
            }
            elseif($user2)
            {
                return response()->json('Para acceder a su cuenta es necesario verificarla antes, revise su correo', 400);   
            }
                $token = $user->createToken($request->email, [$user->role])->plainTextToken;
                return response()->json(["token" => $token], 201);
    }
}

