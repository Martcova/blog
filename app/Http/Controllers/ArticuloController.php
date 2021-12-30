<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $articulos = Articulo::all();

          return response()->json ([
              'error' =>false,
              'response' => $articulos
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
        $articulo = Articulo::create($request->all() );

        if (!$articulo){
            return response()->json([
                'error'=>true,
                'message'=>"Error al crear el articulo"
            ],400);
        }else{
            return response()->json([
                'error'=>false,
                'response'=>$articulo
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
        $articulo = Articulo::find($id);
        if (!$articulo){
            return response ()->json([
                'error'=>true,
                'message'=>"El articulo no existe"
            ],404);
        }else{
            return response ()->json([
                'error'=>false,
                'message'=>$articulo
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
        $articulo = Articulo::find($request->id);
        $articulo->nombre = $request->nombre;
        $articulo->descripcion = $request->descripcion;
        $articulo->save();
        if (!$articulo){
            return response ()->json([
                'error'=>true,
                'message'=>"No se pudo editar el articulo"
            ],404);
        }else{
            return response ()->json([
                'error'=>false,
                'message'=>$articulo
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
        $articulo = Articulo::destroy($id);
       
        if (!$articulo){
            return response ()->json([
                'error'=>true,
                'message'=>"No se puede eliminar el articulo"
            ],404);
        }else{
            return response ()->json([
                'error'=>false,
                'message'=>$articulo
            ],200);
        }

    }
}
