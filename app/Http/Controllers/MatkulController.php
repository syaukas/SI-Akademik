<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function index()
    {
        $matkuls = Matkul::all();
        return view('matkul.index', compact('matkuls'));
    }

    public function create()
    {
        $dosens = Dosen::all();
        return view('matkul.create', compact('dosens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sks' => 'required|numeric',
            'dosens_id' => 'required',
        ]);

        Matkul::create([
            'name' => $request->name,
            'sks' => $request->sks,
            'dosens_id' => $request->dosens_id,
        ]);

        return redirect('/matkul');

    }

    public function edit()
    {
        $dosens = Dosen::all();
        return view('matkul.edit', compact('dosens'));
    }
}
