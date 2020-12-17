<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
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
        return view('ticket.index', ['tickets' => Ticket::cursor()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('ticket.add', ['user' => $user]);
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
            'objet'=>"bail|required|max:100|min:10",
            'message'=>"required"
        ]);
        $ticket = new Ticket();
        $ticket->objet = $request->objet;
        $ticket->departement = $request->departement;
        $ticket->priorite = $request->priorite;
        $ticket->message = $request->message;
        $ticket->user_id = Auth::id();
        $ticket->save();
        return back()->with('success', 'Reponse a été ajouté!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $ticket->user = $ticket->user;
        $ticket->reponses = $ticket->reponses;
        return view('ticket.show', ['ticket' => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->etat = 1;
        $ticket->save();
        return back()->with('success2', 'Ticket a été fermé!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pack $pack)
    {


    }
}
