<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use App\Models\Paiement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    //active pack
    // public function indexClient()
    // {
    //     return Pack::where("active",1)->get();
    // }
   
    public function index()
    {
        $packs = Pack::get();
        return view('pack.index', ['packs' => $packs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pack = new Pack();
        $pack->titre = $request->titre;
        if($request->offre){
            $pack->offre = $request->offre;
        }
        $pack->solde = $request->solde;
        $pack->prix = $request->prix;
        if($request->description){
            $pack->description = $request->description;
        }
        if($request->active){
            $pack->active = $request->active;
        }
        $pack->save();
        return back()->with('success', 'Pack a été ajouté!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $pack = Pack::findOrFail($id);
        $facture =Paiement::select('id')->orderBy('id', 'desc')->first();
        $now = date('Y-m-d', strtotime(Carbon::now()));
        if(!$facture){
            $facture=0;
        }
        return view('pack.show', ['pack' => $pack, 'user' => $user, 'facture' => $facture, 'now' => $now]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function edit(Pack $pack)
    {
        return view('pack.edit', ['pack' => $pack]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pack $pack)
    {
        $pack->titre = $request->titre;
        if($request->offre){
            $pack->offre = $request->offre;
        }
        $pack->solde = $request->solde;
        $pack->prix = $request->prix;
        if($request->description){
            $pack->description = $request->description;
        }
        if($request->active){
            $pack->active = $request->active;
        }else{
            $pack->active=0;
        }
        $pack->save();
        return back()->with('success', 'Pack a été ajouté!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pack $pack)
    {

        $pack->delete();
        return back()->with('success', 'Pack a été Supprimé!');

    }
}
