<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Reclamation;


class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        if(isset($_GET['client'])){
            $client = Client::with('reclamations')->findOrFail($_GET['client']);
            if(Auth::user()->id ==  $client->user_id){
                foreach ($client->reclamations as $reclamation) {
                    if($reclamation->user_id == $client->user_id){
                        return redirect()->route('dashboard');
                    }
                }
                return view('reclamation.index',['client'=>$client]);
            }
        }
        return redirect()->route('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addReclamation(Request $request)
    {
        $client = Client::find($request->input('client'));

        if($client->reclamations){
            foreach($client->reclamations as $reclamation){
                if($reclamation->user_id == $request->input('user')){
                    return redirect()->back();
                }
            }
        }
        
        $request->validate([
            'commentaire' => 'required|min:10',
        ]);

        $reclamation                = new Reclamation();
        $reclamation->user_id       = $request->input('user');
        $reclamation->commentaire   = $request->input('commentaire');
        $client->reclamations()->save($reclamation);
        return redirect()->back();
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
            'nom' => 'required',
            'email' => 'required|email',
        ]);
        $client             = Client::findOrFail($request->input('id'));
        $client->nom        = $request->input('nom');
        $client->email      = $request->input('email');
        $client->save();
        return redirect()->back();
    }

}
