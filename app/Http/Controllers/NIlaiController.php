<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Penilaian;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Buku;

class NilaiController extends BaseController
{
    public function ListSantri(){
        $user = User::where('role', 0)->get();

        // return view('santri.List',['santri'=>$user]);
        return view('',['user'=>$user]);
    }

    public function view(){
        $nilai = Nilai::where('id', 1)->first();

        return view('kriteriapenilaian',['nilai' => $nilai]);
    }

    public function KriteriaPenilaian(Request $request){
        $nilai = Nilai::find(1);

        $request->validate([
            'tugas' => 'required|numeric',
            'bacaan' => 'required|numeric',
            'hafalan' => 'required|numeric',
            'absen' => 'required|numeric',
        ]);

        $nilai->fill($request->all());
        $nilai->save();
        return redirect()->route('kriteriapenilaian')->with('status', 'profile-updated');
    }

    public function HasilPenilaian($id){


        $penilaian = Penilaian::where('user_id', $id)->get();
        $kelas = Kelas::all();
        $user = User::where('id', $id)->first();
        $nilai = Nilai::first();

        if ($penilaian->isEmpty()) {
            return abort(404);
        }

        return view('hasilpenilaian', ['penilaian' => $penilaian, 'kelas' => $kelas, 'user' => $user, 'nilai'=>$nilai]);
    }

    public function Penilaian(){
        $kelas = Kelas::all();
        $user = User::where('role', 0)->get();
        $buku = Buku::all();

        return view('penilaian', ['kelas'=>$kelas, 'user'=>$user, 'buku'=> $buku]);
    }

    public function PenilaianGuru(){
        $kelas = Kelas::all();
        $user = User::where('role', 0)->get();
        $buku = Buku::all();

        return view('hasilpenilaianguru', ['kelas'=>$kelas, 'user'=>$user, 'buku'=> $buku]);
    }

    public function KasihNilai(Request $request){
        // dd($request);

        $request->validate([
            'id' => 'required',
            'absen' => 'required|numeric',
            'tugas'=> 'required|numeric',
            'bacaan'=> 'required|numeric',
            'hafalan' => 'required|numeric',
            'rata-rata_jilid' => 'required|numeric',
        ]);

        $penilaian = Penilaian::where('user_id', $request->id)->where('buku_id', $request->buku_id)->first();
        
        if($penilaian){
            $penilaian->fill($request->all());
            $penilaian->save();
            return redirect()->back()->with('status', 'profile-updated');
        }else{
            return redirect()->back()->with('status', 'no-user');
        }
    }
    }
}
