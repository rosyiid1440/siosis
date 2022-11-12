<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidat;
use App\Models\Periode;
use Auth;
use Alert;

class KandidatController extends Controller
{
    public function index()
    {
        $data = Periode::orderBy('nama_periode','DESC')->get();

        return view('kandidat/periode',compact('data'));
    }

    public function show($nama_periode)
    {
        $periode = Periode::where('nama_periode',$nama_periode)->first();
        $kandidat = Kandidat::where('periode_id',$periode->id)->get();

        return view('kandidat/kandidat',compact('periode','kandidat'));
    }

    public function create($nama_periode)
    {
        $periode = Periode::where('nama_periode',$nama_periode)->first();

        return view('kandidat/add',compact('periode'));
    }

    public function store(Request $request)
    {
        $periode = Periode::find($request->periode_id);

        $request->validate([
            'nama_kandidat' => 'required',
            'urut' => 'required',
            'periode_id' => 'required',
            'visi_misi' => 'required'
        ]);

        $kandidat = new Kandidat;
        $kandidat->nama_kandidat = $request->nama_kandidat;
        $kandidat->urut = $request->urut;
        $kandidat->periode_id = $request->periode_id;
        $kandidat->visi_misi = $request->visi_misi;
        $kandidat->save();

        Alert::success('Success', 'Success Add Data');
        return redirect('kandidat/'.$periode->nama_periode);
    }

    public function edit($id)
    {
        $data = Kandidat::find($id);
        $periode = Periode::find($data->periode_id);

        return view('kandidat/edit',compact('data','periode'));
    }

    public function update($id,Request $request)
    {
        $periode = Periode::find($request->periode_id);

        $request->validate([
            'nama_kandidat' => 'required',
            'urut' => 'required',
            'periode_id' => 'required',
            'visi_misi' => 'required'
        ]);

        $kandidat = Kandidat::find($id);
        $kandidat->nama_kandidat = $request->nama_kandidat;
        $kandidat->urut = $request->urut;
        // $kandidat->periode_id = $request->periode_id;
        $kandidat->visi_misi = $request->visi_misi;
        $kandidat->save();

        Alert::success('Success', 'Success Update Data');
        return redirect('kandidat/'.$periode->nama_periode);
    }

    public function destroy($id)
    {
        $kandidat = Kandidat::find($id);
        $periode = Periode::find($kandidat->periode_id);

        $kandidat->delete();

        Alert::success('Success', 'Success Delete Data');
        return redirect('kandidat/'.$periode->nama_periode);
    }
}