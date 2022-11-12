<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;
Use Alert;

class PeriodeController extends Controller
{
    public function index()
    {
        $data = Periode::orderBy('nama_periode','desc')->get();
        return view('periode/periode', compact('data'));
    }

    public function create()
    {
        return view('periode/add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_periode' => 'required|max:4',
            'status' => 'required'
        ]);

        Periode::create($request->all());

        Alert::success('Success', 'Success Add Data');
        return redirect('/periode');
    }

    public function edit($id)
    {
        $data = Periode::find($id);

        return view('periode/edit',compact('data','id'));
    }

    public function update($id,Request $request)
    {
        $request->validate([
            'nama_periode' => 'required|max:4',
            'status' => 'required'
        ]);

        Periode::find($id)->update($request->all());

        Alert::success('Success', 'Success Update Data');
        return redirect('/periode');
    }

    public function destroy($id)
    {
        try{
            Periode::find($id)->delete();

            Alert::success('Success', 'Success Delete Data');
            return redirect('periode');
        }catch(Exception $e){
            Alert::error('Error', 'Error Delete Data');
            return redirect('periode');
        }
    }
}