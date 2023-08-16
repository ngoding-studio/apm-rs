<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhanzaPasien extends Model
{
    protected $connection = 'mysql2';
    protected $table      = 'pasien';
    public $timestamps    = false;
}
