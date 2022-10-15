<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Diskusi;
use App\Model\Komentar;
use Auth;
use Storage;

class kelolaDiskusiController extends Controller
{
    public function index()
    {
        $konteks = 'diskusi';
        // dd($konteks);
        return view('KMS.kelola', compact('konteks'));
    }

    public function store(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $dokumen = new Diskusi;
        $dokumen->user_id = Auth::id();
        $dokumen->judul = $req->judul;
        $dokumen->pertanyaan = $req->pertanyaan;
        $dokumen->status = $req->status;
        $dokumen->save();
        return redirect()->back()->with('success', 'File berhasil di input');
    }

    public function list(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $diskusi = Diskusi::get();
        // dd($pengetahuan);
        foreach($diskusi as $item){
            $pertanyaan = $item->pertanyaan;
            if( strlen($item->pertanyaan) > intval(300)) {
                $pertanyaan = explode( "\n", wordwrap( $pertanyaan, intval(300)));
                $pertanyaan = $pertanyaan[0] . '...';
            }
            $item->pertanyaan = $pertanyaan;
        }
        
        $konteks = 'diskusi';
        // dd($pengetahuan);
        return view('KMS.ubah', compact('diskusi','konteks'));
    }

    public function detail(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $diskusi = Diskusi::where('id', $req->id)->with('komentar')->first();
        // dd($diskusi);
        // dd($pengetahuan);
        $konteks = $req->konteks;
        if($req->konteks == 'liat'){
            // dd('liat');
            return view('KMS.detail_diskusi', compact('diskusi','konteks'));
        }else{
            return view('KMS.detail_diskusi', compact('diskusi','konteks'));
        }
    }

    public function update(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $diskusi = Diskusi::where('id', $req->id)->first();
        $diskusi->user_id = Auth::id();
        $diskusi->judul = $req->judul;
        $diskusi->pertanyaan = $req->pertanyaan;
        $diskusi->status = $req->status;
        $diskusi->save();

        $konteks = $req->konteks;
        if($req->konteks == 'liat'){
            // dd('liat');
            return redirect()->back()->with('success', 'Data Berhasil Di Update');
        }else{
            return redirect()->back()->with('success', 'Data Berhasil Di Update');
        }
    }
    
    public function delete(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $diskusi = Diskusi::where('id', $req->id)->delete();
        // dd($pengetahuan);

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }

    public function store_komentar(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $diskusi = new Komentar;
        $diskusi->user_id = Auth::id();
        $diskusi->diskusi_id = $req->id;
        $diskusi->pertanyaan = $req->pertanyaan;
        $diskusi->status = 1;
        $diskusi->save();

        return redirect()->back()->with('success', 'Data Berhasil Di Update');
    }
}
