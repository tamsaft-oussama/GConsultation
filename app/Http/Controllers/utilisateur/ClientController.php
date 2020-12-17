<?php

namespace App\Http\Controllers\utilisateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Client;
use App\Models\Reclamation;
use App\Models\Historique;


class ClientController extends Controller
{
    public function index(){
        return view('utilisateur.client.index',['user'=>Auth::user()]);
    }

    public function store(Request $request){

        Alert::success('Votre réclamation à été bien enregistrer', 'Success Message');
        
        $request->validate([
            'numTel'        => 'bail|required|unique:clients|max:10|min:10',
            'ville'         => 'bail|required',
            'commentaire'   => 'bail|required|min:10'
        ]);

        $client                     = new Client();
        $client->numTel             = $request->input('numTel');
        $client->ville              = $request->input('ville');
        $client->user_id            = $request->input('user_id');
        $client->save();

        $reclamation                = new Reclamation();
        $reclamation->commentaire   = $request->input('commentaire');
        $reclamation->user_id       = $request->input('user_id');
        $reclamation->client_id     = $client->id;
        $reclamation->save();

        return redirect()->back();

    }

    public function search(){
        if(isset($_GET['search'])){

            $client = Client::where('numTel',$_GET['search'])->with('reclamations')->withCount('reclamations')->first();
            $user   = Auth::user();

            if($client){
                if($user->count > 0){
                    $user->count = $user->count -1 ;
                    $user->save();
                    $historique             = new Historique();
                    $historique->user_id    = Auth::user()->id;
                    $historique->tel_client  = $client->numTel;
                    $historique->save();
                    return view('utilisateur.client.index', ['user'=>Auth::user(),'client' => $client,'can'=>$this->verifyUserreclamation($client)]);
                }else{
                    $message = "!! charger votre solde pour faire cette opération";
                    return view('utilisateur.client.index',['user'=>Auth::user(),'message'=>$message]);
                }

            }else{
                $client1                     = new Client();
                $client1->numTel             = $_GET['search'];
                $client1->ville              = 'inconnu';
                $client1->user_id            = Auth::id();
                $client1->save();
                $user->count = $user->count -1 ;
                $user->save();
                return view('utilisateur.client.index', ['user'=>Auth::user(),'client' => $client1,'can'=>$this->verifyUserreclamation($client1)]);
            }
        }
        $message = "Cette Client n'existe pas dans la base de donné,vous pouvez l'ajouter";
        return view('utilisateur.client.index',['user'=>Auth::user(),'message'=>$message]);
    }

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

    private function verifyUserreclamation($client){
        if($client->reclamations){
            foreach($client->reclamations as $reclamation){
                if($reclamation->user_id === Auth::id()){
                    return false;
                }
            }
        }
        return true;
    }
}
