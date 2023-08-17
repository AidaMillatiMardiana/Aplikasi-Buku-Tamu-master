<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purposevolumetwo extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "purposevolumetwos";
    protected $fillable = ['purposevtwo'];
}