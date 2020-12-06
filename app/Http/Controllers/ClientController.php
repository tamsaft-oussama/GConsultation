<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
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
            'numTel' => 'bail|required|max:10|min:10',
            'ville'  => 'bail|required',
        ]);
        $client             = new Client();
        $client->numTel     = $request->input('numTel');
        $client->ville      = $request->input('ville');
        $client->user_id    = $request->input('user_id');
        $client->save();
        return response()->json($client);
    }

    public function search(Request $request){
        $data = $request->input('numTel');
        if($data!=''){
            $client = Client::where('numTel',$data)->get();
            return $client;
        }else{
            return view('client.index',['user'=>Auth::user()]);
        }
    }

}
