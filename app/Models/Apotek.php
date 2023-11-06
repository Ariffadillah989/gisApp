<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apotek extends Model
{
    protected $table = "apotek_location";
    protected $guarded = [];
    use HasFactory;
}
