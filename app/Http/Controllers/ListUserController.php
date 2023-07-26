<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class ListUserController extends BaseController
{
    public function ListSantri(){
        $user = User::where('role', 0)->get();

        // return view('santri.List',['santri'=>$user]);
        return view('datasantri',['santri'=>$user]);
    }

    public function ListGuru(){
        $user = User::where('role', 2)->get();

        return view('dataguru',['guru' => $user]);
    }
}
