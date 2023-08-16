<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skrining extends Model
{
    protected $connection = 'mysql';
    protected $table      = 'skrining';
    protected $fillable   = [
        'userid',
        'norawat',
        'norm',
        'nama',
        'status',
        'tanggal'
    ];
}
