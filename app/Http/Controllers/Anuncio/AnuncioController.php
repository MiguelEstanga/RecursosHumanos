<?php

namespace App\Http\Controllers\Anuncio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anuncion;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public  function __construct()
    {
        // code...
    }

    public function index()
    {   
        $anuncio = Anuncion::orderBy('created_at' , 'desc' )->get();
                return view('registrados.index' , ['anuncion' =>  $anuncio ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registrados.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('America/Caracas');
        Anuncion::create(
          [
            'anuncion' =>$request->anuncion,
            'titulo' => $request->titulo
          ]
       );

        return redirect()->route('anuncion.index')->with('mensage' , 'Mensage Exitosamente Publicado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Anuncion::find($id)->delete();
        return redirect()->route('anuncion.index')->with('mensage' , 'Anuncio eliminado exitosamente.') ;
        //ssh -p 65002 u702812556@149.100.151.91
    }
}
