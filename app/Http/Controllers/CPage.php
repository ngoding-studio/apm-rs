<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\AkunPegawai;
use App\GetAll;

class CPage extends Controller
{
    public function menu(Request $request)
    {
        return view('auth.menu');
    }
    public function offline(Request $request)
    {
        return view('auth.offline');
    }
    public function home(Request $request)
    {
        $poli = GetAll::khanzaPoliklinik();
        $dokter = GetAll::khanzaJadwal();
        return view('apm.home', compact('poli','dokter'));
    }
    public function update(Request $request)
    {
        return view('apm.update');
    }
    public function online(Request $request)
    {
        return view('auth.online');
    }
    public function konfirmasi(Request $request)
    {
        return view('apm.konfirmasi');
    }
    public function bukti(Request $request)
    {
        return view('auth.bukti');
    }
    public function verifikasi(Request $request)
    {
        return view('apm.verifikasi-bukti');
    }

}
