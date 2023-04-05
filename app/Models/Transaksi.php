<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Transaksi extends Model
{
    protected $transaksi = 'transaksi';
    protected $connection = 'mongodb';
    protected $guarded = [];
    use HasFactory;
}
