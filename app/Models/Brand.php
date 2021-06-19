<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable=[
        'name_eng',
        'name_bng',
        'slug_eng',
        'slug_bng',
        'image',
    ];
}
