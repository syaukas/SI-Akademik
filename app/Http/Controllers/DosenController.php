<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:dosens',
            'name' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);
        
        Dosen::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect('/dosen');
    }

    public function edit($id)
    {
        $dosen = Dosen::find($id);
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);
        
        Dosen::find($id)->update([
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect('/dosen');
    }

    public function destroy($id)
    {
        Dosen::destroy($id);

        return redirect('/dosen');
    }
}
