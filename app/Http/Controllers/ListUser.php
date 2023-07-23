<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ListUser extends BaseController
{
    public function ListSantri(){
        $user = User::where('role', 0)->get();

        return view('list.user',['users'=>$users]);
    }
}
