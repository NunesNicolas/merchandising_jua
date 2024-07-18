<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promotor_work_register extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'img',
        'promotor_route_id',
    ];

}