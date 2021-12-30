<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $comentarios = Comentario::all();

          return response()->json ([
              'error' =>false,
              'response' => $comentarios
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
        $comentario = Comentario::create($request->all() );

        if (!$comentario){
            return response()->json([
                'error'=>true,
                'message'=>"Error al crear el comentario"
            ],400);
        }else{
            return response()->json([
                'error'=>false,
                'response'=>$comentario
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
        $comentario = Comentario::find($id);
        if (!$comentario){
            return response ()->json([
                'error'=>true,
                'message'=>"El comentario no existe"
            ],404);
        }else{
            return response ()->json([
                'error'=>false,
                'message'=>$comentario
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
        $comentario = Comentario::find($request->id);
        $comentario->comentario = $request->comentario;
        $comentario->estado = $request->estado;
        $comentario->save();
        if (!$comentario){
            return response ()->json([
                'error'=>true,
                'message'=>"No se pudo editar el comentario"
            ],404);
        }else{
            return response ()->json([
                'error'=>false,
                'message'=>$comentario
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
        $comentario = Comentario::find($id);
        $comentario->delete();
        if (!$comentario){
            return response ()->json([
                'error'=>true,
                'message'=>"No se pudo eliminar el comentario"
            ],404);
        }else{
            return response ()->json([
                'error'=>false,
                'message'=>"Comentario eliminado"
            ],200); 
        }
    }
}
