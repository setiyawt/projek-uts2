<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'Produk';
    protected $guarded = ['id'];

    public function class()
    {
        return $this->belongsTo(Kategori::class,'category_id','id');
    }
}

// return $this->/**
//  * Get the user that owns the Produk
//  *
//  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
//  */
// public function user(): BelongsTo
// {
//     return $this->belongsTo(Kategori::class, 'category_id', 'id');
// }
