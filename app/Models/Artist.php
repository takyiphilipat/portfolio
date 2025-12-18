<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
     use HasFactory;

    protected $fillable = [
        'name',
        'birthdate',
        'music',
        'youtube',
        'image',
        'size',
    ];

    public $timestamps = true;


}
