<?php

namespace App;

use Illuminate\Support\Facades\DB;
use App\Models\Skrining;
use App\Models\KhanzaPeriksa;
use App\Models\PengaturanUpdate;
use App\GetSession;
use App\System;
use App\Kode;

class Create
{
    public static function createDataUpdate($request)
    {
        return PengaturanUpdate::create([
            'norm'              => $request->session()->get('session_norm'),
            'updatedata'        => System::updatedata(),
            'updateskrining'    => System::updateskrining(),
        ]);
    }

    public static function periksaOffline($request,$noreg)
    {
        $pasien = GetSession::pasien($request);
        return KhanzaPeriksa::create([
            'no_reg'            => $noreg,
            'no_rawat'          => Kode::noRawat(),
            'tgl_registrasi'    => System::tanggal(),
            'jam_reg'           => System::jam(),
            'kd_dokter'         => $request->session()->get('session_kd_dokter'),
            'no_rkm_medis'      => $request->session()->get('session_norm'),
            'tanggal_periksa'   => System::tanggal(),
            'kd_poli'           => $request->session()->get('session_kd_poli'),
            'p_jawab'           => $pasien->namakeluarga,
            'almt_pj'           => $pasien->alamat.', '.$pasien->nm_kel.', '.$pasien->nm_kec.', '.$pasien->nm_kab,
            'hubunganpj'        => $pasien->keluarga,
            'biaya_reg'         => 0,
            'stts'              => "Belum",
            'stts_daftar'       => "Lama",
            'status_lanjut'     => "Ralan",
            'kd_pj'             => $request->session()->get('session_kd_bayar'),
            'umurdaftar'        => System::hitungUmur($tanggal = $pasien->tgl_lahir),
            'sttsumur'          => System::statusUmur($tanggal = $pasien->tgl_lahir),
            'status_bayar'      => "Belum Bayar",
            'status_poli'       => "Lama"
        ]);
    }
    public static function skrining($request)
    {
        return Skrining::create([
            'userid'  => $request->session()->get('session_userid'),
            'norawat' => $request->session()->get('session_no_rawat'),
            'norm'    => $request->session()->get('session_norm'),
            'nama'    => $request->session()->get('session_nama'),
            'status'  => "belum",
            'tanggal' => System::tanggal(),
        ]);
    }

}
