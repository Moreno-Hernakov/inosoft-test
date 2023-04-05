<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Motor extends Model
{
    protected $motor = 'motor';
    protected $connection = 'mongodb';
    protected $guarded = [];
    use HasFactory;
}
