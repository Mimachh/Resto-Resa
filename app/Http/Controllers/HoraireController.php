<?php

namespace App\Http\Controllers;

use DateTime;
use DatePeriod;
use DateInterval;
use App\Models\Horaire;
use App\Models\Horaire_decoupe;
use Illuminate\Http\Request;

class HoraireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $horaires = Horaire::all();
    
    
    
     return view('horaires.index', ['horaires' => $horaires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('horaires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $horaire = $request->validate([
            'places' => 'required',
            'start' => 'required',
            'end' => 'required',
          
        ]);

        $create = Horaire::create($horaire);

        $ouvertureMidi = $horaire->ouvertureMidi;
        $ouvertureMidiFormat = date('h:i', strtotime($ouvertureMidi));
        
        $start    = new DateTime($request->start);
        $end      = new DateTime($request->end); // add 1 second because last one is not included in the loop
        $interval = new DateInterval('PT15M');
        $period   = new DatePeriod($start, $interval, $end);

        $previous = '';
        foreach ($period as $dt) {
            $current = $dt->format("h:ia");
            if (!empty($previous)) {
                Horaire_decoupe::create([
                    'start' => $previous,
                    'end' => $current,
                    'horaire_id' => $create->id,
                ]);
            }
        $previous = $current;
        }
    }

            

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horaire  $horaire
     * @return \Illuminate\Http\Response
     */
    public function show(Horaire $horaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horaire  $horaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Horaire $horaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horaire  $horaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horaire $horaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horaire  $horaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horaire $horaire)
    {
        //
    }
}
