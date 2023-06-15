<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matkul;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::all();
        return view('nilai.index', compact('nilais'));
    }

    public function create()
    {
        $matkuls = Matkul::all();
        $mahasiswas = Mahasiswa::all();
        return view('nilai.create', compact('matkuls', 'mahasiswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswas_id' => 'required',
            'matkuls_id' => 'required',
            'nilai_uts' => 'required',
            'nilai_uas' => 'required',
            'unit' => 'required',
            'tahun_ajar' => 'required',
        ]);

        $nilai_akhir = (0.4 * $request->nilai_uts) + (0.6 * $request->nilai_uas);
        
        $index = 1.0;
        $predikat = "";
        if ($nilai_akhir >= 90.0) {
            $index = 4.00;
            $predikat = "A";
        } else if ($nilai_akhir >= 85.0 && $nilai_akhir <= 89.9) {
            $index = 3.67;
            $predikat = "A-";
        } else if ($nilai_akhir >= 78.0 && $nilai_akhir <= 84.9) {
            $index = 3.33;
            $predikat = "B+";
        } else if ($nilai_akhir >= 71.0 && $nilai_akhir <= 77.9) {
            $index = 3.00;
            $predikat = "B";
        } else if ($nilai_akhir >= 68.0 && $nilai_akhir <= 70.9) {
            $index = 2.67;
            $predikat = "B-";
        } else if ($nilai_akhir >= 65.0 && $nilai_akhir <= 67.9) {
            $index = 2.33;
            $predikat = "C+";
        } else if ($nilai_akhir >= 60.0 && $nilai_akhir <= 64.9) {
            $index = 2.00;
            $predikat = "C";
        } else if ($nilai_akhir >= 50.0 && $nilai_akhir <= 59.9) {
            $index = 1.00;
            $predikat = "D";
        } else {
            $index = 0.00;
            $predikat = "E";
        }

        
        /* $data =  */ Nilai::create([
            'mahasiswas_id' => $request->mahasiswas_id,
            'matkuls_id' => $request->matkuls_id,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas,
            'nilai_akhir' => $nilai_akhir,
            'index' => $index,
            'predikat' => $predikat,
            'unit' => $request->unit,
            'thn_ajar' => $request->tahun_ajar,
        ]);

        return redirect('/nilai');
    }

    public function edit($id)
    {
        $matkuls = Matkul::all();
        $mahasiswas = Mahasiswa::all();
        $nilai = Nilai::find($id);
        return view('nilai.edit', compact('matkuls', 'mahasiswas', 'nilai'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'mahasiswas_id' => 'required',
            'matkuls_id' => 'required',
            'nilai_uts' => 'required',
            'nilai_uas' => 'required',
            'unit' => 'required',
            'tahun_ajar' => 'required',
        ]);

        $nilai_akhir = (0.4 * $request->nilai_uts) + (0.6 * $request->nilai_uas);
        
        $index = 1.0;
        $predikat = "";
        if ($nilai_akhir >= 90.0) {
            $index = 4.00;
            $predikat = "A";
        } else if ($nilai_akhir >= 85.0 && $nilai_akhir <= 89.9) {
            $index = 3.67;
            $predikat = "A-";
        } else if ($nilai_akhir >= 78.0 && $nilai_akhir <= 84.9) {
            $index = 3.33;
            $predikat = "B+";
        } else if ($nilai_akhir >= 71.0 && $nilai_akhir <= 77.9) {
            $index = 3.00;
            $predikat = "B";
        } else if ($nilai_akhir >= 68.0 && $nilai_akhir <= 70.9) {
            $index = 2.67;
            $predikat = "B-";
        } else if ($nilai_akhir >= 65.0 && $nilai_akhir <= 67.9) {
            $index = 2.33;
            $predikat = "C+";
        } else if ($nilai_akhir >= 60.0 && $nilai_akhir <= 64.9) {
            $index = 2.00;
            $predikat = "C";
        } else if ($nilai_akhir >= 50.0 && $nilai_akhir <= 59.9) {
            $index = 1.00;
            $predikat = "D";
        } else {
            $index = 0.00;
            $predikat = "E";
        }

        
        /* $data =  */ Nilai::find($id)->update([
            'mahasiswas_id' => $request->mahasiswas_id,
            'matkuls_id' => $request->matkuls_id,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas,
            'nilai_akhir' => $nilai_akhir,
            'index' => $index,
            'predikat' => $predikat,
            'unit' => $request->unit,
            'thn_ajar' => $request->tahun_ajar,
        ]);

        return redirect('/nilai');
    }

    public function destroy($id)
    {
        Nilai::destroy($id);

        return redirect('/nilai');
    }
}
