<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'image',
        'name',
        'category',
        'purchase_price',
        'sale_price',
        'branch',
        'stock',
        'minstock',
        'description',
    ];
}
