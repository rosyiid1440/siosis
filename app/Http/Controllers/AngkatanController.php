<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Angkatan;
use Alert;

class AngkatanController extends Controller
{
    public function index()
    {
        $data = Angkatan::orderBy('nama_angkatan','desc')->get();
        return view('angkatan/angkatan', compact('data'));
    }

    public function create()
    {
        return view('angkatan/add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_angkatan' => 'required|max:4'
        ]);

        Angkatan::create($request->all());

        Alert::success('Success', 'Success Add Data');
        return redirect('/angkatan');
    }

    public function edit($id)
    {
        $data = Angkatan::find($id);

        return view('angkatan/edit',compact('data','id'));
    }

    public function update($id,Request $request)
    {
        $request->validate([
            'nama_angkatan' => 'required|max:4'
        ]);

        Angkatan::find($id)->update($request->all());

        Alert::success('Success', 'Success Update Data');
        return redirect('/angkatan');
    }

    public function destroy($id)
    {
        try{
            Angkatan::find($id)->delete();

            Alert::success('Success', 'Success Delete Data');
            return redirect('angkatan');
        }catch(Exception $e){
            Alert::error('Error', 'Error Delete Data');
            return redirect('angkatan');
        }
    }
}