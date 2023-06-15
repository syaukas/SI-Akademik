<?php

namespace App\Http\Controllers;

use App\Models\Datajurusan;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Matkul;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

    public function dashboard()
    {
        $c_mhs = count(Mahasiswa::all());
        $c_dsn = count(Dosen::all());
        $c_mk = count(Matkul::all());
        return view('dashboard', compact('c_mhs', 'c_dsn', 'c_mk'));
    }

    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        $jurusans = Datajurusan::all();
        return view('mahasiswa.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas|max:9',
            'name' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'datajurusans_id' => 'required',
            'angkatan' => 'required',
        ]);

        Mahasiswa::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'datajurusans_id' => $request->datajurusans_id,
            'angkatan' => $request->angkatan,
        ]);
        return redirect('/mahasiswa');
    }

    public function edit($id)
    {
        $jurusans = Datajurusan::all();
        $mhs = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('jurusans', 'mhs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'datajurusans_id' => 'required',
            'angkatan' => 'required',
        ]);

        Mahasiswa::find($id)->update([
            'name' => $request->name,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'datajurusans_id' => $request->datajurusans_id,
            'angkatan' => $request->angkatan,
        ]);
        return redirect('/mahasiswa');
    }

    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return redirect('/mahasiswa');
    }
}
