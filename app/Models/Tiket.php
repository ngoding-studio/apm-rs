<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
  protected $connection = 'mysql';
  protected $table      = 'tiket';
  protected $primaryKey = 'id';
  protected $fillable   = [
    'iduser',
    'no_tiket',
    'no_rkm_medis',
    'nm_pasien',
    'no_reg',
    'tanggal_booking',
    'jam_booking',
    'tanggal_periksa',
    'jenis_pembayaran',
    'kd_dokter',
    'nm_dokter',
    'kd_poli',
    'nm_poli',
    'status',];
}
