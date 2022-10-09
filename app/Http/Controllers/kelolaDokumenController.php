<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Dokumen;
use App\Model\JenisDokumen;
use Auth;

class kelolaDokumenController extends Controller
{
    public function index()
    {
        $konteks = 'dokumen';
        // dd($konteks);
        $jenisDokumen = JenisDokumen::get();
        return view('KMS.kelola', compact('konteks','jenisDokumen'));
    }

    public function store(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $dokumen = new Dokumen;
        $dokumen->user_id = Auth::id();
        $dokumen->judul = $req->judul;
        $dokumen->keterangan = $req->keterangan;
        $dokumen->jenis_id = $req->jenisDokumen;
        $dokumen->berkas = $req->file('formFile')->getClientOriginalName();
        $req->file('formFile')->move(public_path('storage/file'), $req->file('formFile')->getClientOriginalName());
        $dokumen->save();
        return redirect()->back()->with('success', 'File berhasil di input');
    }

    public function list(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $dokumen = new Dokumen;
        $dokumen->user_id = Auth::id();
        $dokumen->judul = $req->judul;
        $dokumen->keterangan = $req->keterangan;
        $dokumen->jenis_id = $req->jenisDokumen;
        $dokumen->berkas = $req->file('formFile')->getClientOriginalName();
        $req->file('formFile')->move(public_path('storage/file'), $req->file('formFile')->getClientOriginalName());
        $dokumen->save();
        return redirect()->back()->with('success', 'File berhasil di input');
    }
}
