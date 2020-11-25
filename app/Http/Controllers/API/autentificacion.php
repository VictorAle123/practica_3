<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Modelos\Users;
use \Mailjet\Resources;

class autentificacion extends Controller
{
    //


    public function Mail()
    {
       
        $mj = new \Mailjet\Client('d67ba0d21e231d2ce37b4a86ea61f381','660bd103206a612d1c24223f8639243e',true,['version' => 'v3.1']);
  $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "19170170@utt.edu.mx",
                        'Name' => "Victor"
                    ],
                    'To' => [
                        [
                            'Email' => "19170170@utt.edu.mx",
                            'Name' => "Victor"
                        ]
                    ],
                    'Subject' => "Your email flight plan!",
                    'TextPart' => "Dear passenger 1, welcome to Mailjet! May the delivery force be with you!",
                    'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!"
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        if($response->success())
        return response()->json(["por favor verifique su correo y ingrese sus datos"
        =>$response->getData()],200);
        return response()->json(["mensaje"=>$response->getData()],500);
  } 

    

public function index(Request $request)

{

    if ($request->user()->tokenCan('user:info') && $request->user()->tokenCan ('admin:admin'))
    return response()->json(["users"=> Users::all()],200);

    if ($request->user()->tokenCan('user:info'))
    return response()->json(["perfil"=> $request->user()],200);
    abort(401,"Scope invalido");

}


public function logout(Request $request)
{

    return response()->json(["afectados"=> $request->user()->tokens()->delete()],200);
    

}

    public function login (Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password'=> 'required',
    ]);

    $user = Users::where('email',$request->email)->first();


    if (!$user || !Hash::check($request->password, $user->password)) {

        throw ValidationException::withMessages([

            'email|password' =>['Credenciales incorrectas..'],
            
        ]);

    }
    $token = $user->createToken($request->email,['user:info','admin:admin'])->plainTextToken;
    return response()->json(["token" => $token],201);

    }



public function registro12(Request $request)

{

    $request->validate([

        'name' => 'required',
        'email' => 'required|email',
        'password'=> 'required',
       
    ]);


$user           = new Users();
$user->name     =$request->name;
$user->email    =$request->email;
$user->password = hash::make($request->password);

if($user->save())
return response()->json($user,200);


return abort(422,"fallo al insertar");


    }




}
