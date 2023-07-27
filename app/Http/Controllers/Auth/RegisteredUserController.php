<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function SantriView():View{
        $kelas = Kelas::all();

        return view('tambahsantribaru', ['kelas' =>  $kelas]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'alamat' => ['required', 'string'],
            'noTelp' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir'=> ['required', 'date'],
        ]);

        if( preg_match('/^\w+@guru.kh.ac.id$/', $request->email)){
            $role = 2;
        }else{
            $role = 0;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'noTelp'=> $request->noTelp,
            'role' => $role,
            'jenis_kelamin' => $request->{'jenis_kelamin'},
            'tanggal_lahir' => $request->{'tanggal_lahir'},
            'tempat_lahir' => $request->{'tempat_lahir'}
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function storeSantriByAdmin(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'alamat' => ['required', 'string'],
            'noTelp' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir'=> ['required', 'date'],
            'ibu' => ['required', 'string'],
            'kelas_id' => ['required', 'integer'],
        ]);

        if( preg_match('/^\w+@guru.kh.ac.id$/', $request->email)){
            $role = 2;
        }else{
            $role = 0;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'noTelp'=> $request->noTelp,
            'role' => $role,
            'jenis_kelamin' => $request->{'jenis_kelamin'},
            'tanggal_lahir' => $request->{'tanggal_lahir'},
            'tempat_lahir' => $request->{'tempat_lahir'},
            'ibu' => $request->ibu,
            'kelas_id' => $request->kelas_id
        ]);

        event(new Registered($user));

        return redirect('tambahsantribaru')->with('status', 'profile-updated');
    }

     public function storeGuruByAdmin(Request $request): RedirectResponse
    {

        $request->merge(['email' => $request->email . '@guru.kh.ac.id']);


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',"regex:/^\w+@guru.kh.ac.id$/", 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'alamat' => ['required', 'string'],
            'noTelp' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir'=> ['required', 'date'],
        ]);
            

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'noTelp'=> $request->noTelp,
            'role' => 2,
            'jenis_kelamin' => $request->{'jenis_kelamin'},
            'tanggal_lahir' => $request->{'tanggal_lahir'},
            'tempat_lahir' => $request->{'tempat_lahir'},
            'ibu' => null,
            'kelas_id' => null
        ]);

        event(new Registered($user));

        return redirect('tambahgurubaru')->with('status', 'profile-updated');
    }
}
