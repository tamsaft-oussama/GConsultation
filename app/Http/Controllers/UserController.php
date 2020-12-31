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

    const apikey = '4a4be3f19509458838e78c93c85e9156-6ea91fe0-53dc-4302-abce-d392543e18bf';

    public function sendSMS(Request $request){
        $validate = $request->input('code');
        if(strlen ( $request->input('phone') )==10){
            $phone="212".substr($request->input('phone'), 1, 9);
        }
        return $validate . " " . $phone;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://9rknjy.api.infobip.com/sms/2/text/advanced',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{"messages":[{"from":"InfoSMS","destinations":[{"to":"'. $phone .'"}],"text":"Your code is :'.$validate.'"}]}',
            CURLOPT_HTTPHEADER => array(
                'Authorization: App '.self::apikey,
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $validate;
    }
}
