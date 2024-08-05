<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class competitor_survey extends Model
{
    use HasFactory;
    protected $fillable = [
        'cliente_id',
        'promotor_route_id',
        'competitor_id',
        'price',
    ];
}