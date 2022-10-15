<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Dokumen;
use App\Model\JenisDokumen;
use Auth;
use Storage;

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
        $dokumen = Dokumen::get();
        // dd($pengetahuan);
        foreach($dokumen as $item){
            $keterangan = $item->keterangan;
            if( strlen($item->keterangan) > intval(300)) {
                $keterangan = explode( "\n", wordwrap( $keterangan, intval(300)));
                $keterangan = $keterangan[0] . '...';
            }
            $item->keterangan = $keterangan;
        }
        
        $konteks = 'dokumen';
        // dd($pengetahuan);
        return view('KMS.ubah', compact('dokumen','konteks'));
    }

    public function detail(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $dokumen = Dokumen::where('id', $req->id)->with('jenis_dokumen')->first();
        
        // dd($pengetahuan);
        $konteks = $req->konteks;
        if($req->konteks == 'liat'){
            // dd('liat');
            return view('KMS.detail_dokumen', compact('dokumen','konteks'));
        }else{
            $jenisDokumen = JenisDokumen::get();

            return view('KMS.detail_dokumen', compact('dokumen','konteks','jenisDokumen'));
        }
    }

    public function download(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $dokumen = Dokumen::where('id', $req->id)->first();
        // dd($pengetahuan);
        return Storage::disk('public')->download('/file/'.$dokumen->berkas);
        
    }

    public function update(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $dokumen = Dokumen::where('id', $req->id)->first();
        $dokumen->user_id = Auth::id();
        $dokumen->judul = $req->judul;
        $dokumen->keterangan = $req->keterangan;
        $dokumen->jenis_id = $req->jenisdokumen;
        if(file_exists($req->file('formFile'))){

            $dokumen->berkas = $req->file('formFile')->getClientOriginalName();
            $req->file('formFile')->move(public_path('storage/file'), $req->file('formFile')->getClientOriginalName());
        }
        $dokumen->save();

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
        $dokumen = Dokumen::where('id', $req->id)->first();
        // dd($pengetahuan);

        $dokumen->berkas = null;
        Storage::disk('public')->delete($dokumen->berkas);
        $dokumen->save();
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
        $dokumen = Dokumen::where('id', $req->id)->delete();
        // dd($pengetahuan);

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
