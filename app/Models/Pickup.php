<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Pickup extends Model
{
    use HasFactory, SoftDeletes;

   protected $fillable = [
       'nama',
       'latitude',
       'longitude',
       'alamat',
   ];

}
