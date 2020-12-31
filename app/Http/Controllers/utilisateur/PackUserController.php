<?php

namespace App\Http\Controllers\utilisateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Paiement;
use App\Models\Pack;
class PackUserController extends Controller
{
    public function index(){
        $pack=Pack::where('active',1)->orderBy('prix')->cursor();
        return view('utilisateur.pack.index',['user' => Auth::user(),'packs' => $pack]);
    }

    public function show($id)
    {
        $user = Auth::user();
        $pack = Pack::find($id);
        $facture =Paiement::select('id')->orderBy('id', 'desc')->first();
        $now = date('Y-m-d', strtotime(Carbon::now()));
        if(!$facture){
            $facture=0;
        }
        return view('pack.show', ['pack' =>$pack, 'user' => $user, 'facture' => $facture, 'now' => $now]);
    }
}
