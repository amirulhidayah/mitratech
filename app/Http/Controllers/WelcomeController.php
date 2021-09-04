<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Projek;
use App\Models\Client;
use App\Models\Cover;
use App\Models\PlatformProjek;
use App\Models\Tim;

class WelcomeController extends Controller
{
    public function index()
    {
        $projek = Projek::with('platformProjek')->orderByDesc('id')->get();
        $client = Client::get();
        $tim = Tim::orderBy('urutan')->get();
        $cover = Cover::get();
        return view('pages.welcome', compact(['projek', 'client', 'tim', 'cover']));
    }

    public function login()
    {
        return view('pages.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'min:4'],
            'password' => ['required', 'min:4'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function detailProjek(Projek $projek)
    {
        return view('pages.detailProjek', compact(['projek']));
    }

    public function daftarProjek()
    {
        $platforms = PlatformProjek::orderBy('nama')->get();
        $projeks = Projek::with('platformProjek')->cari(request(['cari', 'platform']))->latest()->paginate(6)->withQueryString();
        return view('pages.daftarProjek', compact(['platforms', 'projeks']));
    }
}
