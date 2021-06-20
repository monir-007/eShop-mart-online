<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name_eng',
        'name_bng',
        'slug_eng',
        'slug_bng',
    ];

    public function categoryName()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
