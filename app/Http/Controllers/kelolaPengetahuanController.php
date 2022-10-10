<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Pengetahuan;
use Auth;

class kelolaPengetahuanController extends Controller
{
    
    public function index()
    {
        $konteks = 'pengetahuan';
        return view('KMS.kelola', compact('konteks'));
    }

    public function store(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $pengetahuan = new Pengetahuan;
        $pengetahuan->user_id = Auth::id();
        $pengetahuan->judul = $req->judul;
        $pengetahuan->keterangan = $req->keterangan;
        $pengetahuan->jenis = $req->jenisPengetahuan;
        $pengetahuan->berkas = $req->file('formFile')->getClientOriginalName();
        $req->file('formFile')->move(public_path('storage/file'), $req->file('formFile')->getClientOriginalName());
        $pengetahuan->save();
        return redirect()->back()->with('success', 'File berhasil di input');
    }

    public function list(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $pengetahuan = Pengetahuan::get();
        $konteks = 'pengetahuan';
        // dd($pengetahuan);
        return view('KMS.ubah', compact('pengetahuan','konteks'));
    }

    public function detail(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $pengetahuan = Pengetahuan::where('id', $req->id)->delete();
        // dd($pengetahuan);
        if($req->konteks == 'liat'){
            dd('liat');
            return view('KMS.ubah', compact('pengetahuan','konteks'));
        }else{
            dd('edit');
        }
    }

    public function delete(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $pengetahuan = Pengetahuan::where('id', $req->id)->delete();
        // dd($pengetahuan);

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
