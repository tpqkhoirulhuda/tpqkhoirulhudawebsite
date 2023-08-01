<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\VerifikasiSantriRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Kelas;
use App\Models\Buku;
use App\Models\Penilaian;

class ProfileController extends Controller
{
    public function show(Request $request): View{
        return '';
    }

    public function verifikasiSantri(Request $request)
    {
            $request->validate([
                'kelas' => 'required|numeric',
                'ibu' => 'required|string|max:255',
            ]);

            $user = Auth::user();
            $bukus = Buku::all();

            $user->fill([
                'kelas_id' => $request->kelas,
                'ibu' => $request->ibu,
            ]);

            $user->save();

            foreach ($bukus as $buku) {
                Penilaian::create([
                    "user_id" => $user->id,
                    "buku_id" => $buku->id,
                    "kelas_id" => $user->kelas_id,
                    "tugas" => null,
                    "bacaan" => null,
                    "hafalan" => null,
                    "absen" => null,
                    "rata-rata_jilid" => null
                ]);
            }

            return redirect()->route('dashboard')->with('success', 'User data updated successfully!');
    }


    public function dashboard():View{
        $kelas = Kelas::all();
        return view('dashboard', [
            'kelas' => $kelas,
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd($request);
        $user = $request->user()->fill($request->validated());
        
        // dd($user);
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
