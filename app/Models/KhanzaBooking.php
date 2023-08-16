<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhanzaBooking extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'booking_registrasi';
    public $timestamps = false;
    protected $fillable = [
      'tanggal_booking',
      'jam_booking',
      'no_rkm_medis',
      'tanggal_periksa',
      'kd_dokter',
      'kd_poli',
      'no_reg',
      'kd_pj',
      'limit_reg',
      'waktu_kunjungan',
      'status',
    ];
}
