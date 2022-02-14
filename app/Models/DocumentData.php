<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentData extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_id',
        'logo',
        'slogan',
        'image',
        'agreements',
    ];
}
