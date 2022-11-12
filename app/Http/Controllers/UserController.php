<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Periode;
use Illuminate\Support\Str;
use Alert;

class UserController extends Controller
{
    public function index()
    {
        $data = User::select('users.*','periode.nama_periode')->join('periode','periode.id','users.periode_id')->where('name',null)->get();

        return view('user/user',compact('data'));
    }

    public function create()
    {
        $periode = Periode::orderBy('nama_periode','DESC')->get();
        return view('user/add',compact('periode'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'periode_id' => 'required',
            'jumlah_user' => 'required'
        ]);

        for($i = 0; $i < $request->jumlah_user; $i++){

            $randomString = Str::random(5);

            while(User::where('token',$randomString)->where('periode_id',$request->periode_id)->exists()){
                $random_string = Str::random(5);
            }

            $user = new User;
            $user->token = $randomString;
            $user->periode_id = $request->periode_id;
            $user->save();
        }

        Alert::success('Success', 'Success Add Data');
        return redirect('user');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        Alert::success('Success', 'Success Delete Data');
        return redirect('/user');
    }
}