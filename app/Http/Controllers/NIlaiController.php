<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class NilaiController extends BaseController
{
    

    public function ListGuru(){
        $user = User::where('role', 2)->get();

        return view('guru.List',['guru'=>$user]);
    }
}
