<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\Historique;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index',['user'=>Auth::user()]);
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
            'numTel' => 'bail|required|unique:clients|max:10|min:10',
            'ville'  => 'bail|required',
        ]);

        $user               = User::find($request->input('user_id'));
        $client             = new Client();
        $client->numTel     = $request->input('numTel');
        $client->ville      = $request->input('ville');
        $user->clients()->save($client);
        return redirect()->route('reclamation.index',['client'=>Client::find($client->id)]);
    }

    public function search(){
        if(isset($_POST['search'])){
            $client = Client::where('numTel',$_POST['search'])->with('reclamations')->first();
            if($client){
                $user   = Auth::user();
                if($user->count > 0){
                    $user->count            = $user->count -1 ;
                    $user->save();
                    $historique             = new Historique();
                    $historique->user_id    = Auth::user()->id;
                    $historique->tel_client  = $client->numTel;
                    $historique->save();

                }else{
                    $message = "!! charger votre solde pour faire cette opération";
                    return view('client.index',['user'=>Auth::user(),'message'=>$message]);
                }
            }
            return view('client.show',['client'=>$client->id,'data'=>$client])->with('user');
        }
        $message = "Cette Client n'existe pas dans la base de donné,vous pouvez l'ajouter";
        return view('client.index',['user'=>Auth::user(),'message'=>$message]);
    }

}
