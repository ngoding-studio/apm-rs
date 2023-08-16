<?php

namespace App;

use Illuminate\Support\Facades\DB;
use App\Models\KhanzaPasien;
use App\Models\KhanzaPeriksa;
use App\Models\PengaturanUpdate;
use App\Models\Skrining;
use App\Models\Kartu;
use App\Models\Tiket;

class GetSession
{
    public static function pasien($request)
    {
        return KhanzaPasien::join('kelurahan','pasien.kd_kel','=','kelurahan.kd_kel')
        ->join('kecamatan','pasien.kd_kec','=','kecamatan.kd_kec')
        ->join('kabupaten','pasien.kd_kab','=','kabupaten.kd_kab')
        ->where('no_rkm_medis', $request->session()->get('session_norm'))
        ->first(
            RequestData::arrayPasien()
        );
    }
    public static function verifikasi($request)
    {
        return KhanzaPasien::where('tgl_lahir', $request->tgl_lahir)
        ->where('no_rkm_medis', $request->session()->get('session_norm'))
        ->first();
    }
    public static function cekbayar($request)
    {
        return KhanzaPeriksa::where('no_rkm_medis', $request->session()->get('session_norm'))
        ->where('status_bayar', "Belum Bayar")
        ->first();
    }
    public static function pengaturan($request)
    {
        return PengaturanUpdate::where('norm', $request->session()->get('session_norm'))->first();
    }
    public static function pengaturanKartu($request)
    {
        return Kartu::where('no_rkm_medis', $request->session()->get('session_norm'))->first();
    }
    public static function tiket($request)
    {
        return Tiket::where('kode_tiket', $request->session()->get('session_kodetiket'))->first();
    }
    public static function skrining($request)
    {
        return Skrining::where('norawat', $request->session()->get('session_no_rawat'))->first();
    }
}
