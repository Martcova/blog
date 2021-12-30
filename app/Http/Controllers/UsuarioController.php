<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $usuarios = User::all();

          return response()->json ([
              'error' =>false,
              'response' => $usuarios
            ], 200);
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
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

     $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if (!$user){
            return response()->json([
                'error'=>true,
                'message'=>"Error al crear el usuario"
            ],400);}
        else{
            return response()->json([
                'error'=>false,
                'response'=>$user
            ],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);
        if (!$usuario){
            return response ()->json([
                'error'=>true,
                'message'=>"El usuario no existe"
            ],404);
        }else{
            return response ()->json([
                'error'=>false,
                'message'=>$usuario
            ],200);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $usuario = User::find($request->id);
        $usuario->rol_id = $request->rol_id;
        $usuario->save();
        if (!$usuario){
            return response ()->json([
                'error'=>true,
                'message'=>"No se pudo editar el usuario"
            ],404);
        }else{
            return response ()->json([
                'error'=>false,
                'message'=>$usuario
            ],200); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        if (!$usuario){
            return response ()->json([
                'error'=>true,
                'message'=>"No se pudo eliminar el usuario"
            ],404);
        }else{
            return response ()->json([
                'error'=>false,
                'message'=>"Usuario eliminado"
            ],200); 
        }
    }





    
}
