<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $roles = Rol::all();

          return response()->json ([
              'error' =>false,
              'response' => $roles
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
        $rol = Rol::create($request->all() );

        if (!$rol){
            return response()->json([
                'error'=>true,
                'message'=>"Error al crear el rol"
            ],400);
        }else{
            return response()->json([
                'error'=>false,
                'response'=>$rol
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
        $rol = Rol::find($id);
        if (!$rol){
            return response ()->json([
                'error'=>true,
                'message'=>"El rol no existe"
            ],404);
        }else{
            return response ()->json([
                'error'=>false,
                'message'=>$rol
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
        $rol = Rol::find($request->id);
        $rol->nombre = $request->comentario;
        $rol->save();
        if (!$rol){
            return response ()->json([
                'error'=>true,
                'message'=>"No se pudo editar el rol"
            ],404);
        }else{
            return response ()->json([
                'error'=>false,
                'message'=>$rol
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
        $rol = Rol::find($id);
        $rol->delete();
        if (!$rol){
            return response ()->json([
                'error'=>true,
                'message'=>"No se pudo eliminar el rol"
            ],404);
        }else{
            return response ()->json([
                'error'=>false,
                'message'=>"Rol eliminado"
            ],200); 
        }
        
    }
}
