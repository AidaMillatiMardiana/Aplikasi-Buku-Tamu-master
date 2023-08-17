<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TujuanKunjungan extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "tujuan_kunjungans";
    protected $fillable = ['tujuankunjungan_type'];
}
