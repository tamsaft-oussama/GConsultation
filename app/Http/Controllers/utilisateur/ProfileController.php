<?php

namespace App\Http\Controllers\utilisateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    
    
    public function store(Request $request){


        $request->validate([
            'name'          => 'required',
            'email'         => 'required',
            'oldpassword'   => 'required',
            'image'         => 'nullable|mimes:jpg,gif,png'
        ]);

        $user = User::find(Auth::user()->id);

        if($request->input('password') !== null){
            $user->name     = $request->input('name');
            $user->email    = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->profile_photo_path = $this->storePhotoIfExist($request);
            $user->save();
            return redirect()->back();
        }else{
            $user->name     = $request->input('name');
            $user->email    = $request->input('email');
            $user->password = $request->input('oldpassword');
            $user->profile_photo_path = $this->storePhotoIfExist($request);
            $user->save();
            return redirect()->back();
        }
    }

    private function storePhotoIfExist($file){
        if ($file->hasFile('image')){
            $imageName = 'storage/profile-photos/'.time().'.'.$file->image->getClientOriginalExtension(); 
            $file->image->move(public_path('storage/profile-photos/'), $imageName);
            return ($imageName !==null) ? $imageName : 'https://picsum.photos/200';
        }
        return Auth::user()->profile_photo_path;
    }

    public function destroy()
    {
        User::destroy(Auth::id());
        return redirect('home');
    }
}
