<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historique;
use Illuminate\Support\Facades\Auth;


class HistoriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historique = Historique::cursor()->where('user_id',Auth::id());
        return view('historique.index',['historiques'=>$historique,'user'=>Auth::user()]);
    }

    public function userIndex(){
        $historique = Historique::cursor()->where('user_id',Auth::id());
        return view('utilisateur.historique.index',['historiques'=>$historique,'user'=>Auth::user()]); 
    }

}
