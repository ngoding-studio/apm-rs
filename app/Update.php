<?php

namespace App;

use Illuminate\Support\Facades\DB;
use App\Models\KhanzaPasien;
use App\Models\PengaturanUpdate;
use App\Models\Tiket;
use App\Models\Kartu;
use App\System;

class Update
{
    public static function updatePasien($request)
    {
        return KhanzaPasien::where('no_rkm_medis', $request->session()->get('session_norm'))->update([
            'pekerjaan' => $request->pekerjaan,
            'no_tlp' => $request->notelp,
            'alamat' => $request->alamat,
        ]);
    }

    public static function tiket($request)
    {
        return Tiket::where('kode_tiket', $request->session()->get('session_kodetiket'))->update([
            'status' => "Terdaftar",
        ]);
    }

    public static function updatedata($request)
    {
        return PengaturanUpdate::where('norm', $request->session()->get('session_norm'))->update([
            'updatedata'   => System::updatedata(),
        ]);
    }
    public static function updateskrining($request)
    {
        return PengaturanUpdate::where('norm', $request->session()->get('session_norm'))->update([
            'updateskrining'   => System::updateskrining(),
        ]);
    }

    public static function pengaturanKartu($request)
    {
        return Kartu::where('no_rkm_medis', $request->session()->get('session_norm'))->update([
            'updateskrining'   => System::updateskrining(),
        ]);
    }


}
