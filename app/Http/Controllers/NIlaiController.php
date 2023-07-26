<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Nilai;

class NilaiController extends BaseController
{
    public function view(){
        $nilai = Nilai::where('id', 1)->first();

        return view('kriteriapenilaian',['nilai' => $nilai]);
    }

    public function KriteriPenilaian($request){
        $nilai = Nilai::where('id', 1)->first();

        $request->validate([
            'tugas' => 'required|numeric',
            'bacaan' => 'required|numeric',
            'hafalan' => 'required|numeric',
            'absen' => 'required|numeric',
        ]);

        $nilai->fill($request);
        return redirect()->route('kriteriapenilaian');
    }

}
