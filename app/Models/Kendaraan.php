<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Kendaraan extends Model
{
    protected $kendaraan = 'kendaraan';
    protected $connection = 'mongodb';
    protected $guarded = [];
    use HasFactory;
}
