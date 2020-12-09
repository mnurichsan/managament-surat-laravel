<?php

namespace App\Http\Controllers;

use App\Disposisi;
use App\Referensi;
use App\SuratKeluar;
use App\SuratMasuk;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $suratMasukCount = SuratMasuk::all()->count();
        $suratKeluarCount = SuratKeluar::all()->count();
        $referensiCount = Referensi::all()->count();
        $userCount = User::all()->count();
        $disposisiCount = Disposisi::all()->count();
        return view('home', compact('suratMasukCount', 'suratKeluarCount', 'referensiCount', 'userCount', 'disposisiCount'));
    }
}
