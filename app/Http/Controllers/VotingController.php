<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\Voting;
use App\Models\Kandidat;
use App\Events\Edata;
use Auth;
use Alert;

class VotingController extends Controller
{
    public function index()
    {
        $periode = Periode::find(Auth::user()->periode_id);
        $kandidat = Kandidat::where('periode_id',Auth::user()->periode_id)->get();

        return view('voting/voting',compact('kandidat','periode'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kandidat_id' => 'required'
        ]);

        $periode = Kandidat::find($request->kandidat_id)->first();
        $cek = Voting::where('user_id',Auth::user()->id)->first();

        if($cek){
            Alert::error('Error', 'You Has Been Voting !');
            return redirect('/home');
        }

        $voting = new Voting;
        $voting->kandidat_id = $request->kandidat_id;
        $voting->user_id = Auth::user()->id;
        $voting->save();

        broadcast(new Edata($periode->periode_id));
        Alert::success('Success', 'Thanks, Success Voting !');
        return redirect('/home');
    }
}
