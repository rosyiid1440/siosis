<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\User;
use App\Models\Voting;
use App\Models\Kandidat;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->name != null){
            $cek = Periode::where('status','active')->first();
            if($cek){
                $periode = Periode::where('status','active')->first();
                $user = User::where('periode_id',$periode->id)->count();
                $voting = Voting::join('kandidat','kandidat.id','voting.kandidat_id')->where('periode_id',$periode->id)->count();
                $kandidat = Kandidat::where('periode_id',$periode->id)->orderBy('urut')->get();
                return view('home',compact('periode','user','voting','kandidat'));
            }else{
                return redirect('/periode');
            }
        }else{
            return view('user/dashboard/home');
        }
    }
}