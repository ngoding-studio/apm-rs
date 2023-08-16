<?php

namespace App;

use Illuminate\Support\Facades\DB;
use App\Models\KhanzaPasien;
use App\Models\PengaturanUpdate;
use App\Models\Tiket;
use App\System;

class Delete
{
    public static function tiket($request)
    {
        $tiket = "RSBB-".$request->kodetiket;
        return Tiket::where('kode_tiket', $tiket)->delete();
    }

}
