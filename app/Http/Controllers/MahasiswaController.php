<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return Mahasiswa::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => ['required'],
            'nim' => ['required', 'integer'],
            'fakultas' => ['required'],
            'jurusan' => ['required'],
            'no_hp' => ['required'],
            'no_wa' => ['required'],
            'user_id' => ['required']
        ]);

        $mahasiswa = new Mahasiswa;
        $mahasiswa->nama_lengkap = $request->nama_lengkap;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->fakultas = $request->fakultas;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->no_hp = $request->no_hp;
        $mahasiswa->no_wa = $request->no_wa;
        $mahasiswa->user_id = $request->user_id;

        $mahasiswa->save();


        // $mahasiswa = auth()->user()->mahasiswa()->create()([
        //     'nama_lengkap' => request('title'),
        //     'nim' => request('nim'),
        //     'fakultas' => request('fakultas'),
        //     'jurusan' => request('jurusan'),
        //     'nohp' => request('nohp'),
        //     'nowa' => request('nowa'),
        //     'user_id' => Auth::user()->id
        // ]);

        return $mahasiswa;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Mahasiswa::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nama_lengkap = $request->nama_lengkap;
        $nim = $request->nim;
        $fakultas = $request->fakultas;
        $jurusan = $request->jurusan;
        $no_hp = $request->no_hp;
        $no_wa = $request->no_wa;

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama_lengkap = $nama_lengkap;
        $mahasiswa->nim = $nim;
        $mahasiswa->fakultas = $fakultas;
        $mahasiswa->jurusan = $jurusan;
        $mahasiswa->no_hp = $no_hp;
        $mahasiswa->no_wa = $no_wa;
        $mahasiswa->save();

        return $mahasiswa;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        return "Data Mahasiswa Berhasil dihapus";
    }
}
