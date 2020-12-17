<?php

namespace App\Http\Controllers\utilisateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TickettController extends Controller
{
    public function index(){
        return view('utilisateur.ticket.index',['user'=>Auth::user()]);
    }
}
