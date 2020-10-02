<?php

namespace App\Http\Controllers;

use App\Pinjaman;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pinjaman::all();
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
            'tanggal_peminjaman' => ['required', 'date'],
            'tanggal_batas_akhir' => ['required', 'date'],
            'tanggal_pengembalian' => ['required', 'date'],
            'user_id' => ['required'],
            'buku_id' => ['required'],
        ]);

        $pinjaman = new Pinjaman;
        $pinjaman->tanggal_peminjaman = $request->tanggal_peminjaman;
        $pinjaman->tanggal_batas_akhir = $request->tanggal_batas_akhir;
        $pinjaman->tanggal_pengembalian = $request->tanggal_pengembalian;
        $pinjaman->user_id = $request->user_id;
        $pinjaman->buku_id = $request->buku_id;

        $pinjaman->save();

        return $pinjaman;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Pinjaman::find($id);
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
        $tanggal_peminjaman = $request->tanggal_peminjaman;
        $tanggal_batas_akhir = $request->tanggal_batas_akhir;
        $tanggal_pengembalian = $request->tanggal_pengembalian;
        $user_id = $request->user_id;
        $buku_id = $request->buku_id;
        $status_ontime = $request->status_ontime;

        $pinjaman = Pinjaman::find($id);
        $pinjaman->tanggal_peminjaman = $tanggal_peminjaman;
        $pinjaman->tanggal_batas_akhir = $tanggal_batas_akhir;
        $pinjaman->tanggal_pengembalian = $tanggal_pengembalian;
        $pinjaman->user_id = $user_id;
        $pinjaman->buku_id = $buku_id;
        $pinjaman->status_ontime = $status_ontime;
        $pinjaman->save();

        return $pinjaman;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pinjaman = Pinjaman::find($id);
        $pinjaman->delete();

        return "Data Pinjaman Berhasil dihapus";
    }
}
