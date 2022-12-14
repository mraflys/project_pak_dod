<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Pengetahuan;
use Auth;
use Storage;

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
        // dd($pengetahuan);
        foreach($pengetahuan as $item){
            $keterangan = $item->keterangan;
            if( strlen($item->keterangan) > intval(300)) {
                $keterangan = explode( "\n", wordwrap( $keterangan, intval(300)));
                $keterangan = $keterangan[0] . '...';
            }
            $item->keterangan = $keterangan;
        }
        
        $konteks = 'pengetahuan';
        // dd($pengetahuan);
        return view('KMS.ubah', compact('pengetahuan','konteks'));
    }

    public function detail(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $pengetahuan = Pengetahuan::where('id', $req->id)->first();
        // dd($pengetahuan);
        $konteks = $req->konteks;
        if($req->konteks == 'liat'){
            // dd('liat');
            return view('KMS.detail_pengetahuan', compact('pengetahuan','konteks'));
        }else{
            return view('KMS.detail_pengetahuan', compact('pengetahuan','konteks'));
        }
    }

    public function download(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $pengetahuan = Pengetahuan::where('id', $req->id)->first();
        // dd($pengetahuan);
        return Storage::disk('public')->download('/file/'.$pengetahuan->berkas);
        
    }

    public function update(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $pengetahuan = Pengetahuan::where('id', $req->id)->first();
        $pengetahuan->user_id = Auth::id();
        $pengetahuan->judul = $req->judul;
        $pengetahuan->keterangan = $req->keterangan;
        $pengetahuan->jenis = $req->jenisPengetahuan;
        if(file_exists($req->file('formFile'))){
            $pengetahuan->berkas = $req->file('formFile')->getClientOriginalName();
            $req->file('formFile')->move(public_path('storage/file'), $req->file('formFile')->getClientOriginalName());
        }
        $pengetahuan->save();

        $konteks = $req->konteks;
        if($req->konteks == 'liat'){
            // dd('liat');
            return redirect()->back()->with('success', 'Data Berhasil Di Update');
        }else{
            return redirect()->back()->with('success', 'Data Berhasil Di Update');
        }
    }

    public function hapusfile(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $pengetahuan = Pengetahuan::where('id', $req->id)->first();
        // dd($pengetahuan);

        $pengetahuan->berkas = null;
        Storage::disk('public')->delete($pengetahuan->berkas);
        $pengetahuan->save();
        $konteks = $req->konteks;

        if($req->konteks == 'liat'){
            // dd('liat');
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        }else{
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
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
