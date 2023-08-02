<?php

namespace App\Http\Controllers\Solisitud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoDesolisitudes;

class TipoDeSolisitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('solisitudes.index' , 
            [ 
                'solisitudes' => TipoDesolisitudes::all() 
            ]
        );   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('solisitudes.create' , [ 'solisitudes' => TipoDesolisitudes::all() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
      
        TipoDesolisitudes::create([
            'Tipo_Solisitud' => $request->Tipo_Solisitud
        ]);

        return redirect()->route('solisitudes.index')->with('mensage' , 'La nueva solicitud ha sido creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solisitu = TipoDesolisitudes::find($id);
        return view('solisitud.edit' , ['solisitud' => $solisitu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solisitu = TipoDesolisitudes::find($id);
        return view('solisitudes.edit' , ['solisitud' => $solisitu]);
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
        $editar =   TipoDesolisitudes::find($id);
        $editar->Tipo_Solisitud = $request->Tipo_Solisitud;
        $editar->save();
        return redirect()->route('solisitudes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
