<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Reclamation;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $client         = Client::count();
        $reclamation    = Reclamation::count();
        $user           = User::count();
        return view('dashboard',compact(['client','reclamation','user']));
    }
}
