<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Mobil extends Model
{
    protected $mobil = 'mobil';
    protected $connection = 'mongodb';
    protected $guarded = [];
    use HasFactory;
}
