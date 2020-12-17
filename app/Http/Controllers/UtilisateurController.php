<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Historique;
use App\Models\Reclamation;

class UtilisateurController extends Controller
{
    public function index(){
        $reclamationCount = Reclamation::count();
        $historique = Historique::cursor()->where('user_id',Auth::id());
        return view('utilisateur.index',['historiques'=> $historique,'user'=> Auth::user(),'reclamations'=> $reclamationCount]);
    }
}
