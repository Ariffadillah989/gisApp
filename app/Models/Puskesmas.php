<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
    protected $table = "puskesmas_location";
    protected $guarded = [];
    use HasFactory;
}
