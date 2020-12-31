<?php

namespace App\Http\Controllers\utilisateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;


class TickettController extends Controller
{
    public function index(){
        return view('utilisateur.ticket.index',['user'=>Auth::user()]);
    }

    public function store(Request $request){
        $request->validate([
            'objet'         => 'required',
            'priorite'      => 'required',
            'departement'   => 'required',
            'message'       => 'required'
        ]);

        Ticket::create([
            'objet'         => $request->input('objet'),
            'priorite'      => $request->input('priorite'),
            'departement'   => $request->input('departement'),
            'message'       => $request->input('message'),
            'lue'           => 1,
            'user_id'       => Auth::id()
        ]);

        return back()->with('success', 'Demande a été ajouté!');
    }

    public function show($id){
        $ticket = Ticket::findOrFail($id);
        $user   = Auth::user();
        return view('utilisateur.ticket.show',['ticket'=> $ticket,'user' => $user]);
    }
    public function all()
    {
        $tickets2 = Auth::user()->tickets;
        return view('utilisateur.ticket.all', ['tickets2' => $tickets2, 'user'=>Auth::user()]);

    }

}
