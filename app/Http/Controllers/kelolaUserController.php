<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\BagianKerja;
use Illuminate\Support\Facades\Hash;


class kelolaUserController extends Controller
{
    public function list(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $user = User::with('bagker')->get();
        // dd($pengetahuan);
        // dd($user);
        $konteks = 'user';
        // dd($pengetahuan);
        return view('KMS.ubah', compact('user','konteks'));
    }

    public function index(Request $req)
    {
        if($req->konteks == 'tambah'){
            $konteks = $req->konteks;
            // dd($konteks);
            $BagianKerja = BagianKerja::orderby('label','ASC')->get();
            return view('KMS.tambah_user', compact('BagianKerja','konteks'));
        }else{
            
            $user = User::where('id',$req->id)->first();
            $konteks = $req->konteks;
            // dd($konteks);
            $BagianKerja = BagianKerja::orderby('label','ASC')->get();
            return view('KMS.tambah_user', compact('BagianKerja','konteks','user'));
        }
        
    }

    public function store(Request $req){
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'bagian_kerja' => $req->bagian_kerja,
            'status' => 1,
            'role' => 1,
            'password' => Hash::make($req->password),
        ]);

        return redirect()->back()->with('success', 'User berhasil di input');
    }

    public function update(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $user = User::where('id',$req->id)->first();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->bagian_kerja = $req->bagian_kerja;
        if(is_null($req->password)||isset($req->password)){
            $user->password = Hash::make($req->password);
        }

        $user->save();

        $konteks = $req->konteks;
        return redirect()->back()->with('success', 'Data Berhasil Di Update');
    }

    public function delete(Request $req)
    {
        // dd($req->file('formFile')->getClientOriginalName());
        $diskusi = User::where('id', $req->id)->delete();
        // dd($pengetahuan);

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }

    public function chat(Request $req)
    {
        return view('KMS.chat');
    }
}
