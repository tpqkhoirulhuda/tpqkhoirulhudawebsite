<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\DataSantriRequest;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Nilai;

class ListUserController extends BaseController
{
    public function ListSantri(){
        $user = User::where('role', 0)->get();
        $kelas = Kelas::all();
        $nilai = Nilai::first();
        return view('datasantri',['santri'=>$user, 'kelas'=>$kelas, 'nilai'=>$nilai]);
    }

    public function ListGuru(){
        $user = User::where('role', 2)->get();

        return view('dataguru',['guru' => $user]);
    }

    public function deleteUser(Request $request){
        try{
            $user = User::where('id', $request->id)->delete();
            
            return redirect()->back()->with('status', 'profile-deleted');
        }catch(Exception $err){
            return redirect()->back()->with('status', 'profile-not-update');
        }
    }

    public function updateUser(Request $request){
        try{
            $user = User::where('id', $request->id)->first();
            $user->fill($request->all());
            $user->save();
            return redirect()->back()->with('status', 'profile-updated');
        }catch(Exception $err){
             return redirect()->back()->with('status', 'profile-not-update');
        }
    }


}
