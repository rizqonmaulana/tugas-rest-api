<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Buku::all();
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
            'kode_buku' => ['required', 'unique:buku,kode_buku'],
            'judul' => ['required'],
            'pengarang' => ['required'],
            'tahun_terbit' => ['required']
        ]);

        $buku = new Buku;
        $buku->kode_buku = $request->kode_buku;
        $buku->judul = $request->judul;
        $buku->pengarang = $request->pengarang;
        $buku->tahun_terbit = $request->tahun_terbit;

        $buku->save();

        return $buku;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Buku::find($id);
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
        $kode_buku = $request->kode_buku;
        $judul = $request->judul;
        $pengarang = $request->pengarang;
        $tahun_terbit = $request->tahun_terbit;

        $buku = Buku::find($id);
        $buku->kode_buku = $kode_buku;
        $buku->judul = $judul;
        $buku->pengarang = $pengarang;
        $buku->tahun_terbit = $tahun_terbit;

        $buku->save();

        return $buku;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete($id);

        return "Data Buku Berhasil dihapus";
    }
}
