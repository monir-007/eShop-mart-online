<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function productImage()
    {
        return $this->belongsTo(Product::class,'product_id', 'id');
    }
}
