<?php

namespace App;

use Illuminate\Support\Facades\DB;
use App\Models\KhanzaJadwal;
use App\Models\KhanzaPasien;
use App\Models\KhanzaPeriksa;

class GetRequest
{
    public static function pasien($request)
    {
        return KhanzaPasien::where('no_rkm_medis', $request->norm)->first();
    }
    public static function noregPeriksa($request, $booking)
    {
        return KhanzaPeriksa::where('kd_dokter', $request->kd_dokter)
        ->where('no_reg', $booking)
        ->where('tgl_registrasi', System::tanggal())
        ->first();
    }
    public static function khanzaJadwal($request)
    {
        return KhanzaJadwal::join('dokter', 'jadwal.kd_dokter', '=', 'dokter.kd_dokter')
        ->join('spesialis', 'dokter.kd_sps', '=', 'spesialis.kd_sps')
        ->join('poliklinik', 'jadwal.kd_poli', '=', 'poliklinik.kd_poli')
        ->groupBy('dokter.kd_dokter')
        ->where('dokter.status', '1')
        ->where('poliklinik.kd_poli', $request->kd_poli)
        ->get(array(
            'dokter.kd_dokter',
            'dokter.nm_dokter',
        ));
    }
    public static function bukti($request)
    {
        return KhanzaPeriksa::join('pasien','pasien.no_rkm_medis','=','reg_periksa.no_rkm_medis')
        ->join('kelurahan','pasien.kd_kel','=','kelurahan.kd_kel')
        ->join('kecamatan','pasien.kd_kec','=','kecamatan.kd_kec')
        ->join('kabupaten','pasien.kd_kab','=','kabupaten.kd_kab')
        ->join('dokter','reg_periksa.kd_dokter','=','dokter.kd_dokter')
        ->join('poliklinik','reg_periksa.kd_poli','=','poliklinik.kd_poli')
        ->join('penjab','pasien.kd_pj','=','penjab.kd_pj')
        ->where('pasien.no_rkm_medis', $request->norm)
        ->where('reg_periksa.status_bayar',"Belum Bayar")
        ->first();
    }
}
