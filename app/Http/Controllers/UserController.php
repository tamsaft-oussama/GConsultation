<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::cursor();
        return view('user.index',['users'=>$data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back();
    }

    public function makeAdmin(Request $request) 
    {
        $user       = User::find($request->input('id'));
        $user->role = 1;
        $user->save();
        return redirect()->back();
    }
    public function show(User $user)
    {
        return view('user.show', ['user' => $user]);
    }
}
