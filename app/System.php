<?php

namespace App;
use App\GetAll;

class System
{
    public static function jam()
    {
        date_default_timezone_set('Asia/Jakarta');
        return date("H:i:s");
    }
    public static function tanggal()
    {
        date_default_timezone_set('Asia/Jakarta');
        return date("Y-m-d");
    }

    public static function datetime()
    {
        date_default_timezone_set('Asia/Jakarta');
        return date("Y-m-d H:i:s");
    }

    public static function tahun()
    {
        date_default_timezone_set('Asia/Jakarta');
        return date("Y");
    }

    public static function bulan()
    {
        date_default_timezone_set('Asia/Jakarta');
        return date("m");
    }

    public static function hari()
    {
        date_default_timezone_set('Asia/Jakarta');
        return date("d");
    }
    public static function hitungUmur($tanggal)
    {
        date_default_timezone_set('Asia/Jakarta');
        $today = date("Y-m-d");
        $diff = date_diff(date_create($tanggal), date_create($today));
        $tahun = $diff->format('%y');
        $bulan = $diff->format('%m');
        $hari  = $diff->format('%d');
        if($tahun == 0 && $bulan == 0 && $hari >= 0 ){
            return $hari;
        } else if($tahun == 0 && $bulan >= 0 && $hari >= 0 ){
            return $bulan;
        }  else if($tahun >= 0 && $bulan >= 0 && $hari >= 0 ){
            return $tahun;
        }
    }
    public static function statusUmur($tanggal)
    {
        date_default_timezone_set('Asia/Jakarta');
        $today = date("Y-m-d");
        $diff = date_diff(date_create($tanggal), date_create($today));
        $tahun = $diff->format('%y');
        $bulan = $diff->format('%m');
        $hari  = $diff->format('%d');
        if($tahun == 0 && $bulan == 0 && $hari >= 0 ){
            return 'Hr';
        } else if($tahun == 0 && $bulan >= 0 && $hari >= 0 ){
            return 'Bl';
        }  else if($tahun >= 0 && $bulan >= 0 && $hari >= 0 ){
            return 'Th';
        }
    }

    public static function tanggalLengkap()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal =date('Y-m-d');
        $bulan = (new self)->switchBulan($tanggal);
        $tgl    = substr($tanggal,8,2);
        $tahun  = substr($tanggal,0,4);
        return $tgl.' '.$bulan.' '.$tahun;
    }


    function switchHari($day)
    {
        date_default_timezone_set('Asia/Jakarta');
        $d = date("D", strtotime($day));
        switch($d){
            case 'Sun': $hari = "Minggu"; break;
            case 'Mon': $hari = "Senin"; break;
            case 'Tue': $hari = "Selasa"; break;
            case 'Wed': $hari = "Rabu"; break;
            case 'Thu': $hari = "Kamis"; break;
            case 'Fri': $hari = "Jumat"; break;
            case 'Sat': $hari = "Sabtu"; break;
            default: $hari = "Tidak di ketahui"; break;
        }
        return $hari;
    }
    function switchBulan($mounth)
    {
        $m = date("M", strtotime($mounth));
        switch($m){
            case 'Jan': $bulan = "Januari"; break;
            case 'Feb': $bulan = "Februari";  break;
            case 'Mar': $bulan = "Maret"; break;
            case 'Apr': $bulan = "April"; break;
            case 'May': $bulan = "Mei"; break;
            case 'Jun': $bulan = "Juni"; break;
            case 'Jul': $bulan = "Juli"; break;
            case 'Aug': $bulan = "Agustus"; break;
            case 'Sep': $bulan = "September"; break;
            case 'Oct': $bulan = "Oktober"; break;
            case 'Nov': $bulan = "November"; break;
            case 'Dec': $bulan = "Desember"; break;
            default: $bulan = "Tidak ada bulan lain"; break;
        }
        return $bulan;
    }
    public static function updatedata()
    {
        $tanggal = GetAll::pengaturan();
        return date("Y-m-d", strtotime($tanggal->pasien_update.' month'));
    }
    public static function updateskrining()
    {
        $tanggal = GetAll::pengaturan();
        return date("Y-m-d", strtotime($tanggal->pasien_skrining.' month'));
    }

    public static function berhasil($data)
    {
        $response['status'] = "berhasil";
        $response['data']   = $data;
        $data = json_encode($response);
        return response($data , 200)->header('Content-Type', 'text/plain');
    }
    public static function gagal($data)
    {
        $response['status'] = "gagal";
        $response['data']   = $data;
        $data = json_encode($response);
        return response($data , 200)->header('Content-Type', 'text/plain');
    }
    public static function update($data)
    {
        $response['status'] = "update";
        $response['data']   = $data;
        $data = json_encode($response);
        return response($data , 200)->header('Content-Type', 'text/plain');
    }
    public static function lanjut($data)
    {
        $response['status'] = "lanjut";
        $response['data']   = $data;
        $data = json_encode($response);
        return response($data , 200)->header('Content-Type', 'text/plain');
    }
}
