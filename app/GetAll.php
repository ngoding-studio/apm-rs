<?php

namespace App;

use Illuminate\Support\Facades\DB;
use App\Models\KhanzaBooking;
use App\Models\KhanzaPasien;
use App\Models\KhanzaJadwal;
use App\Models\KhanzaPoliklinik;
use App\Models\KhanzaPeriksa;
use App\Models\Pengaturan;
use App\Models\PengaturanUpdate;
use App\Models\Tiket;
use App\System;

class GetAll
{
    public static function pengaturan()
    {
        return Pengaturan::first();
    }
    public static function projek()
    {
        return Projek::where('nama', config('app.name'))->first();
    }
    public static function khanzaPoliklinik()
    {
        return KhanzaPoliklinik::where('status', '1')
        ->get(array(
            'poliklinik.nm_poli',
            'poliklinik.kd_poli',
        ));
    }
    public static function khanzaJadwal()
    {
        return KhanzaJadwal::join('dokter', 'jadwal.kd_dokter', '=', 'dokter.kd_dokter')
        ->join('spesialis', 'dokter.kd_sps', '=', 'spesialis.kd_sps')
        ->join('poliklinik', 'jadwal.kd_poli', '=', 'poliklinik.kd_poli')
        ->groupBy('dokter.kd_dokter')
        ->orderBy('dokter.nm_dokter','asc')
        ->where('dokter.status', '1')
        ->get(array(
            'dokter.kd_dokter',
            'dokter.nm_dokter',
        ));
    }
}
