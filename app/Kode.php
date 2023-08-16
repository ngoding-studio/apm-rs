<?php

namespace App;


use Illuminate\Support\Facades\DB;
use App\Models\KhanzaPeriksa;
use App\Models\KhanzaBooking;
use App\System;

class Kode
{

    public static function noRawat()
    {
        $tanggal = System::tahun().'/'.System::bulan().'/'.System::hari();
        $periksa = KhanzaPeriksa::where('tgl_registrasi', System::tanggal())->orderBy('jam_reg', 'desc')->first();
        if (empty($periksa)) {
            $kode = '000001';
        } else {
            $nomor = substr($periksa->no_rawat,11);
            $string = preg_replace("/[^0-9\.]/", '', $nomor);
            $kode = sprintf('%06d', $string+1);
        }
        return $tanggal.'/'.$kode;
    }

    public static function noregbooking($request)
    {
        $booking = KhanzaBooking::where('tanggal_periksa',System::tanggal())->where('kd_dokter', $request->kd_dokter)->max('no_reg');
        if ($booking == null) {
            $kode = '001';
        } else {
          $string = preg_replace("/[^0-9\.]/", '', $booking);
          $kode = sprintf('%03d', $string+1);
        }
        return $kode;
    }
    public static function noregperiksa($request)
    {
        $periksa = KhanzaPeriksa::where('tgl_registrasi',System::tanggal())->where('kd_dokter', $request->kd_dokter)->max('no_reg');
        if ($periksa == null) {
            $kode = '001';
        } else {
          $string = preg_replace("/[^0-9\.]/", '', $periksa);
          $kode = sprintf('%03d', $string+1);
        }
        return $kode;
    }

}
