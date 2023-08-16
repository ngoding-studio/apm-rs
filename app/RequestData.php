<?php

namespace App;


use Illuminate\Support\Facades\DB;

class RequestData
{

    public static function arrayPasien()
    {
        return array(
            'pasien.no_rkm_medis',
            'pasien.nm_pasien',
            'pasien.tgl_lahir',
            'pasien.alamat',
            'pasien.namakeluarga',
            'pasien.keluarga',
            'pasien.no_tlp',
            'kelurahan.nm_kel',
            'kecamatan.nm_kec',
            'kabupaten.nm_kab',
        );
    }
}
