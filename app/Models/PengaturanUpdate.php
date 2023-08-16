<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaturanUpdate extends Model
{
    protected $connection = 'mysql';
    protected $table      = 'pengaturan_update_pasien';
    protected $primaryKey = 'id';
    protected $fillable   = [
        'norm',
        'updatedata',
        'updateskrining',
    ];
}
