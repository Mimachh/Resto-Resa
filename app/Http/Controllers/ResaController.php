<?php

namespace App\Http\Controllers;

use App\Models\Resa;
use App\Models\Horaire;
use Illuminate\Http\Request;

class ResaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horaires = Horaire::all();

        return view('resas.create', ['horaires' => $horaires]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Creation de la Resa */
        $data = $request->validate([
            'places' => 'required',
            'horaire_decoupes_id' => 'required',
            'name' => 'required',
          
        ]);

        $create = Resa::create($data);

        /* Calcul du nombre de places restantes */
        
        $number_places = $create->horaire_decoupes->horaire->places;

        $new_places = $number_places - $create->places;


        /* Find la trancher horaire concernée */
        
        $id_horaire = $create->horaire_decoupes->horaire->id;

        $horaire = Horaire::find($id_horaire);

        /* Intégration du nouveau nombre de places */
        
        $horaire->fill(['places'=>$new_places]);
        
        if($horaire->isDirty())
        {
            $horaire->save();
        }
    
        return redirect()->route('resas.show', $create->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resa  $resa
     * @return \Illuminate\Http\Response
     */
    public function show(Resa $resa)
    {
        return view('resas.show', compact('resa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resa  $resa
     * @return \Illuminate\Http\Response
     */
    public function edit(Resa $resa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resa  $resa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resa $resa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resa  $resa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resa $resa)
    {
        //
    }
}
